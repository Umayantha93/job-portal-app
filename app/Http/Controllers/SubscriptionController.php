<?php

namespace App\Http\Controllers;

use App\Http\Middleware\isEmployer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class SubscriptionController extends Controller
{

    const WEEKLY_AMOUNT = 20;
    const MONTHLY_AMOUNT = 70;
    const YEARLY_AMOUNT = 400;
    const CURRENCY = 'USD';

    public function __construct()
    {
        $this->middleware(['auth', isEmployer::class]);
    }

    public function subscribe()
    {
        return view('subscription.index');
    }

    public function initiatePayment(Request $request)
    {

        $plans = [
            'weekly' => [
                'name' => 'weekly',
                'description' => 'weekly payment',
                'amount' => self::WEEKLY_AMOUNT * 100, // Amount in cents
                'currency' => self::CURRENCY,
                'quantity' => 1,
            ],
            'monthly' => [
                'name' => 'monthly',
                'description' => 'monthly payment',
                'amount' => self::MONTHLY_AMOUNT * 100, // Amount in cents
                'currency' => self::CURRENCY,
                'quantity' => 1,
            ],
            'yearly' => [
                'name' => 'yearly',
                'description' => 'yearly payment',
                'amount' => self::YEARLY_AMOUNT * 100, // Amount in cents
                'currency' => self::CURRENCY,
                'quantity' => 1,
            ]
        ];

        Stripe::setApiKey(config('services.stripe.secret'));
        try{
            $selectPlan = null;

            if($request->is('pay/weekly'))
            {
                $selectPlan = $plans['weekly'];
                $billingEnds = now()->addWeek()->startOfDay()->toDateString();
            }elseif($request->is('pay/monthly')){
                $selectPlan = $plans['weekly'];
                $billingEnds = now()->addMonth()->startOfDay()->toDateString();
            }elseif($request->is('pay/monthly')){
                $selectPlan = $plans['weekly'];
                $billingEnds = now()->addYear()->startOfDay()->toDateString();
            }
            if($selectPlan)
            {
                $successURl = URL::signedRoute('payment.success', [
                    'plan' => $selectPlan['name'],
                    'billing_ends' => $billingEnds
                ]);
                $session = Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => [
                        [
                            'price_data' => [
                                'currency' => $selectPlan['currency'],
                                'unit_amount' => $selectPlan['amount'],
                                'product_data' => [
                                    'name' => $selectPlan['name'],
                                    'description' => $selectPlan['description'],
                                ],
                            ],
                            'quantity' => 1,
                        ]
                    ],
                    'mode' => 'payment',
                    'success_url' => $successURl,
                    'cancel_url' => route('payment.cancel'),
                ]);
                return redirect($session->url);
            }
        }catch(Exception $e){
            return $e;
        }
    }

    public function paymentSuccess()
    {
        // update db
    }

    public function cancel()
    {
        // redirect
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Customer;
use App\Models\FreightBill;
use App\Models\ShippingPartner;
use App\Models\TrackingOrder;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GetPackage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-package';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Call API To Get List Package';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = route('api.package');

        try {
            $response = Http::post($url);

            if ($response->successful()) {
                $data = $response->json();

                if (isset($data['packages']) && is_array($data['packages'])) {
                    foreach ($data['packages'] as $package) {
                        TrackingOrder::updateOrCreate(
                            ['package_id' => $package['id'] ?? null],
                            [
                                'package_code' => $package['code'] ?? null,
                                'status_transport' => $package['status_transport'] ?? null,
                                'weight' => $package['weight_net'] ?? null,
                                'warehouse_id' => $package['id_warehouse_current'] ?? null,
                                'customer_id' => $package['customer']['id'] ?? null,
                                'order_id' => $package['order']['id'] ?? null,
                                'order_code' => $package['order']['code'] ?? null,
                                'order_create_time' => Carbon::parse($package['created_at'])->toDateTimeString() ?? null,
                            ]
                        );

                        Customer::updateOrCreate(
                            ['customers_id' => $package['customer']['id'] ?? null],
                            [
                                'agency_id' => $package['customer']['id_agency'] ?? null,
                                'code' => $package['customer']['code'] ?? null,
                                'username' => $package['customer']['username'] ?? null,
                                'address' => $package['customer']['address'] ?? null,
                                'email' => $package['customer']['email'] ?? null,
                                'full_name' => $package['customer']['full_name'] ?? null,
                                'phone' => $package['customer']['phone'] ?? null,
                                'type' => $package['customer']['type'] ?? null,
                            ]
                        );

                        ShippingPartner::updateOrCreate(
                            ['partner_id' => $package['shipping_partners']['id'] ?? null],
                            [
                                'name' => $package['shipping_partners']['name'] ?? null,
                                'code' => $package['shipping_partners']['code'] ?? null,
                                'address' => $package['shipping_partners']['address'] ?? null,
                            ]
                        );

                        if (isset($package['order']['freight_bills']) && is_array($package['order']['freight_bills'])) {
                            foreach ($package['order']['freight_bills'] as $freightBill) {
                                FreightBill::updateOrCreate(
                                    ['package_id' => $package['id'], 'freight_bill' => $freightBill['freight_bill']],
                                    []
                                );
                            }
                        }
                    }
                    $this->info('Packages saved to the database successfully.');
                } else {
                    $this->error('Invalid response structure');
                }
            } else {
                $this->error('Failed to retrieve packages: ' . $response->body());
            }
        } catch (\Exception $e) {
            $this->error('An error occurred: ' . $e->getMessage());
        }
    }
}

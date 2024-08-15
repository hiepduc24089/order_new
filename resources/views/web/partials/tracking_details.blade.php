<style>
    .tracking-wrapper {
        margin: 0 15px;
        border-radius: 10px;
    }

    .tracking-wrapper hr {
        margin: 10px 0;
    }

    .text-color-green {
        color: #28a745;
    }
    #copyButton{
        border: none;
        background: none;
        color: #28a745;
    }
    #copyButton:hover{
        color: #218838;
    }
    .transport_status_btn {
        background-color: rgb(114, 172, 77);
        border-radius: 15px;
        border: none;
        padding: 2px 20px;
    }
</style>

<div class="body d-flex py-3">
    <div class="container-xxl tracking-field">
        <div class="title">
            <h5 class="mb-0">Danh sách đơn ký gửi</h5>
        </div>
        <hr>
        @php
            $statuses = [
                'Đã Ký Gửi' => 'ACCEPTED',
                'Chờ Duyệt' => 'PENDING',
                'Người Bán Giao' => 'MERCHANT_DELIVERING',
                'Hàng Về Kho TQ' => 'PUTAWAY',
                'Vận Chuyển Quốc Tế' => 'TRANSPORTING',
                'Chờ Giao' => 'READY_FOR_DELIVERY',
                'Đang Giao' => 'DELIVERING',
                'Đã Nhận Hàng' => 'DELIVERED',
                'Đã Huỷ' => 'CANCELLED',
                'Thất Lạc' => 'MIA',
                'Không Nhận Hàng' => 'DELIVERY_CANCELLED',
            ];
            $statusKeys = array_flip($statuses);
        @endphp
        @if(!empty($trackingOrders) && count($trackingOrders) > 0)
            @foreach($trackingOrders as $trackingOrder)
                <div class="row g-3 mb-3 color-bg-fff tracking-wrapper">
                    <div class="col-md-12 mb-3">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                        <span class="text-color-green font-weight-bold d-flex align-items-center">
                            <span id="orderId">{{$trackingOrder->package_id ?? "N/A"}}</span>
                            <button id="copyButton" title="Copy Order ID">
                                <i class="fa fa-copy"></i>
                            </button>
                        </span>
                                <span>| Khách hàng:</span>
                                <span class="warehouse font-weight-bold ml-2 mr-2">{{$trackingOrder->customer->full_name ?? "N/A"}}</span>
                                <span>| Kho nhận:</span>
                                <span class="warehouse font-weight-bold ml-2">{{$trackingOrder->warehouse->name ?? "N/A"}}</span>
                            </div>
                            <button class="transport_status_btn color-fff">
                                {{ $statusKeys[$trackingOrder->status_transport] ?? "" }}
                            </button>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <span>Mã vận đơn: </span>
                                <span class="font-weight-bold">
                                @if($trackingOrder->freightBills->isNotEmpty())
                                        {{ $trackingOrder->freightBills->pluck('freight_bill')->implode(', ') }}
                                    @else
                                        N/A
                                    @endif
                            </span>
                            </div>
                            <div class="col-md-3">
                                <span>Mã bao: </span>
                                <span class="font-weight-bold">{{$trackingOrder->bag_id ?? 'N/A'}}</span>
                            </div>
                            <div class="col-md-4">
                                <span> Mã kiện: </span>
                                <span class="font-weight-bold">{{$trackingOrder->package_code ?? 'N/A'}}</span>
                            </div>
                        </div>
                        <hr>
                        @php
                            $freightCharge = 17000;
                        @endphp
                        <div>
                            <span>Cước Vận Chuyển Quốc Tế: <span class="font-weight-bold" style="color: #0067ff">{{ number_format($freightCharge, 0, ',', '.') }} VND</span></span>
                        </div>
                        <hr>
                        <div>
                            <span>Dịch vụ: <span class="font-weight-bold">Vận chuyển hàng lẻ</span></span>
                        </div>
                        <hr>
                        <div class="container-fluid">
                            <div class="row" style="row-gap: 10px">
                                <div class="col-xl-2 col-md-3 col-sm-4 col-6 p-0">
                                    <label class="w-100 mb-0">Tổng tiền hàng</label>
                                    <span class="text-color-green font-weight-bold">{{number_format ($freightCharge * $trackingOrder->weight , 0, ',', '.')}} VND</span>
                                </div>
                                <div class="col-xl-2 col-md-3 col-sm-4 col-6 p-0">
                                    <label class="w-100 mb-0">Tổng chi phí</label>
                                    <span class="text-color-green font-weight-bold">{{number_format ($freightCharge * $trackingOrder->weight , 0, ',', '.')}} VND</span>
                                </div>
                                <div class="col-xl-2 col-md-3 col-sm-4 col-6 p-0">
                                    <label class="w-100 mb-0">Cần thanh toán</label>
                                    <span class="text-color-green font-weight-bold">{{number_format ($freightCharge * $trackingOrder->weight , 0, ',', '.')}} VND</span>
                                </div>
                                <div class="col-xl-2 col-md-3 col-sm-4 col-6 p-0">
                                    <label class="w-100 mb-0">Thời gian</label>
                                    <span class="font-weight-bold">
                                    {{ $trackingOrder->order_create_time ? Carbon\Carbon::parse($trackingOrder->order_create_time)->format('H:i d/m/Y') : 'N/A' }}
                                </span>
                                </div>
                                <div class="col-xl-2 col-md-3 col-sm-4 col-6 p-0">
                                    <label class="w-100 mb-0">Số lượng kiện</label>
                                    <span class="font-weight-bold">1</span>
                                </div>
                                <div class="col-xl-2 col-md-3 col-sm-4 col-6 p-0">
                                    <label class="w-100 mb-0">Cân nặng tính phí</label>
                                    <span class="font-weight-bold">{{$trackingOrder->weight ?? '0'}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (!empty($trackingOrders) && $trackingOrders->total() > ($request['per_page'] ?? 10))
                <div class="pagination-center d-flex justify-content-center">
                    {{$trackingOrders->links() }}
                </div>
            @endif
        @else
            Không Tìm Thấy Kết Quả
        @endif


    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const copyButton = document.getElementById('copyButton');
        const orderId = document.getElementById('orderId').textContent.trim();

        copyButton.addEventListener('click', function() {
            const tempInput = document.createElement('input');
            tempInput.value = orderId;
            document.body.appendChild(tempInput);

            tempInput.select();
            document.execCommand('copy');

            document.body.removeChild(tempInput);
        });
    });
</script>

@extends('kasir.layout.layout')
@push('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- select2 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  <!-- select2-bootstrap4-theme -->
  <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet"> <!-- for live demo page -->
  <link href="select2-bootstrap4.css" rel="stylesheet"> <!-- for local development env -->
        <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('arsip/admin/vendors/css/vendor.bundle.base.css')}}">
   <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('arsip/admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('arsip/admin/images/favicon.png')}}" />
  <style type="text/css">
      
.delete-butn {
  display: inline-block;
  Cursor: pointer;
}
.delete-butn {
    font-size: 1.5rem;
    font-weight: 400;
}
.quantity {
  padding-top: 20px;
}
.quantity input {
  -webkit-appearance: none;
  border: none;
  text-align: center;
  width: 32px;
  font-size: 16px;
  color: #43484D;
  font-weight: 300;
}
 
button[class*=butn] {
  width: 25px;
  height: 25px;
  background-color: transparent;
  border-radius: 6px;
  border: none;
  cursor: pointer;
}
.minus-butn img {
  margin-bottom: 3px;
}
.plus-butn img {
  margin-top: 2px;
}
 
button:focus,
input:focus {
  outline:0;
}
.total-price {
  width: 83px;
  padding-top: 27px;
  text-align: center;
  font-size: 16px;
  color: #43484D;
  font-weight: 300;
}
  </style>
@endpush
@section('content')
		<div class="row">
			<div class="col-sm-6">
				<div class="row">
					<div class="col-lg-12 grid-margin stretch-card">
						<div class="card">
						    <div class="card-body">
								  <h5 class="card-title">Pilih Menu yang Dipesan : </h5>
								  <form action="{{route('K.A.C')}}">
								    <div class="form-group w-100">
								      <select name="selected_items[]" id="sI" multiple placeholder="Choose Menu" class="ps-3" data-allow-clear="1" required>
								        @foreach($item as $li)
								        	<option value="{{$li->id}}"><p>{{$li->name}}</p><p class="text-end">{{$li->harga}}</p></option>
								        @endforeach
								      </select>
								    </div>
								      <button class="btn btn-primary w-25" id="adi">Tambah</button>
								</form>
			    			</div>
			    		</div>
			    	</div>
    				<div class="col-lg-12 grid-margin stretch-card">
    					<div class="card">
    					  <div class="card-body">
    							<h5 class="card-title fw-semibold">Pesanan</h5>
						    @php $total = 0 @endphp
    						<div class="table-responsive">
        						<table class="table table-hovered align-middle pt-2 pb-2" id="table">
				            		<thead class="mt-2">
						                <tr class="">
						                	<th class="border-bottom-2">
						                		
						                    </th>
						                    <th class="border-bottom-2">
						                        <p class="fw-semibold mb-0">Gambar</p>
						                    </th>
						                    <th class="border-bottom-2">
						                        <p class="fw-semibold mb-0">Nama</p>
						                    </th>
						                    <th class="border-bottom-2">
						                        <p class="fw-semibold mb-0">Harga</p>
						                    </th>
						                    <th class="border-bottom-2">
						                        <p class="fw-semibold mb-0">Jumlah</p>
						                    </th>
						                    <th class="border-bottom-2">
						                        <p class="fw-semibold mb-0">Sub Total</p>
						                    </th>
						                </tr>
						            </thead>
						            <tbody class="mb-2">
						    @if(session('Tcart'))
								        @foreach(session('Tcart') as $id => $details)
								            @php $total += $details['harga'] * $details['quantity'] @endphp
								            <!-- Data akan ditampilkan di sini -->
								            <tr class="listitem" data-id="{{ $id }}">
								                <td>
								                    <div class="buttons d-flex position-relative align-items-center">
								                        <span class="delete-butn"><i class="ti ti-x"></i></span>
								                    </div>
								                </td>
								                <td class="border-bottom-1">
								                    <img src="{{asset('arsip/data/img/'. $details['img'] )}}" width="50" class="img-thumbnail">
								                </td>
								                <td class="border-bottom-1">
								                    <p class="fw-semibold mb-0">{{ $details['name'] }}</p>
								                </td>
								                <td class="border-bottom-1">Rp.
								                    <p class="fw-semibold mb-0 priceText"><span id="PR">{{ $details['harga'] }}</span></p>
								                </td>
								                <td class="tdQ border-bottom-1">
								                    <div class="quantity d-flex">
								                        <button class="plus-butn" type="button" name="button">
								                            <i class="ti ti-plus"></i>
								                        </button>
								                        <input type="text" name="quantity" value="{{ $details['quantity'] }}" class="update-cart">
								                        <button class="minus-butn" type="button" name="button">
								                            <i class="ti ti-minus"></i>
								                        </button>
								                    </div>
								                </td>
								                <td class="tdST border-bottom-1">
								                    <p class="fw-semibold mb-0 total-price">Rp.{{ $details['harga'] * $details['quantity'] }}</p>
								                </td>
								            </tr>
								        @endforeach
									</tbody>
						    @endif
						        </table>
			    			</div>
			    			@if(session('Tcart'))
						    @else
							    <h5 class="text-center text-secondary my-5">Belum Ada Item Disini!</h5>
							@endif
                          </div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
			           	<h5 class="card-title">Form Transaksi</h5>
						<form action="{{ route('K.T.S') }}" method="post">
	                		@csrf
	             			<div class="col-sm-12 align-items-center p-1 mb-3">
	                			<p class="h-100">Total</p>
	                 			<input type="number" id="total-price" name="total-price" class="form-control w-100 text-end">
	             			</div>
	             			<div class="col-sm-12 align-items-center p-1 mb-3">
	                			<p class="h-100">Metode Pembayaran</p>
				                <select name="metode_pembayaran" class="form-control w-100">
				                    <option value="Tunai">Tunai</option>
				                    <option value="Kartu Kredit">Kartu Kredit</option>
				                    <!-- Tambahkan metode pembayaran lainnya jika diperlukan -->
				                </select>
	            			</div>
				             <div class="col-sm-12 align-items-center p-1 mb-3">
				                <p class="h-100">Uang Pembayaran</p>
				                 <input type="number" id="money-price" value="0" name="money-price" class="form-control w-100 text-end">
				             </div>
				             <div class="col-sm-12 align-items-center p-1 mb-3">
				                <p class=""> Kembalian</p>
				                 <input type="number" id="money-return" name="money-return" class="form-control w-100 text-end">
				             </div>
				             <div class="col-sm-12 d-flex justify-content-end align-items-center p-1 mb-1">
				                <button type="submit" name="action" value="print" class="w-25 btn btn-info m-1" id="print-button" disabled><i class="ti ti-printer"></i></button>
				                <button type="submit"name="action" value="selesai" class="w-75 btn btn-success m-1" id="selesai-button" disabled>Selesai</button>
				             </div>
					    </form>
					</div>
				</div>
			</div>
		</div>
@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

//OFFLINE
 <script src="{{asset('arsip/admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('arsip/admin/js/off-canvas.js')}}"></script>
  <script src="{{asset('arsip/admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('arsip/admin/js/settings.js')}}"></script>
  <script src="{{asset('arsip/admin/js/todolist.js')}}"></script>
<script>
$(function () {
  $('select').each(function () {
    $(this).select2({
      theme: 'bootstrap4',
      width: 'style',
      placeholder: $(this).attr('placeholder'),
      allowClear: Boolean($(this).data('allow-clear')),
    });
  });
});
</script>
<script>
	var jq3 = $.noConflict(true);
    const dn = new Date();
const dnf = dn.getDate() + "-" + (dn.getMonth()+1) + "-" + dn.getFullYear();
$('#date-cart').text(dnf);

$(".plus-butn").click(function (e) {
    e.preventDefault();
    var ele = $(this).closest(".listitem");
    var quantityInput = ele.find(".tdQ .quantity input");
    var quantity = parseInt(quantityInput.val());
    if (!isNaN(quantity)) {
        quantityInput.val(quantity + 1);
        updateCartItemT(ele, quantity + 1);
    }
});

$(".minus-butn").click(function (e) {
    e.preventDefault();
    var ele = $(this).closest(".listitem");
    var quantityInput = ele.find(".tdQ .quantity input");
    var quantity = parseInt(quantityInput.val());
    
    if (!isNaN(quantity) && quantity > 1) {
        quantityInput.val(quantity - 1);
        updateCartItemT(ele, quantity - 1);
    }
});

$(".update-cart").change(function (e) {
    e.preventDefault();
    var ele = $(this).closest(".listitem");
    var quantity = parseInt($(this).val());
    
    if (!isNaN(quantity)) {
        updateCartItemT(ele, quantity);
    }
});

function updateCartItemT(ele, quantity) {
    jq3.ajax({
        url: '{{ route('K.U.C') }}',
        method: "patch",
        data: {
            _token: '{{ csrf_token() }}', 
            id: ele.data("id"), 
            quantity: quantity
        },
        success: function (response) {
            // Update total price for this item
            var harga = parseInt(ele.find(".priceText #PR").text().replace("Rp.", ""));
            ele.find(".total-price").text("Rp." + (harga * quantity));
            
            // Recalculate total price for all items
            calculateTotalPrice();
        }
    });
}

function calculateTotalPrice() {
    var total = 0;
    $(".listitem").each(function () {
        var harga = parseInt($(this).find(".priceText #PR").text().replace("Rp.", ""));
        var quantity = parseInt($(this).find(".tdQ .quantity input").val());
        if (!isNaN(harga) && !isNaN(quantity)) {
            total += harga * quantity;
        }
    });
    
    $("#total-price").val(total);
    $("#total-print").val(total);
    calculateMoReturn()
}
 setInterval(calculateTotalPrice, 800);


$(".delete-butn").click(function (e) {
    e.preventDefault();
    var ele = $(this).closest(".listitem");
    var itemId = ele.data("id");

        jq3.ajax({
            url: '{{ route('K.R.C') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}',
                id: itemId
            },
            success: function (response) {
                ele.remove(); // Hapus item dari DOM
                calculateTotalPrice(); // Hitung ulang total harga
            }
        });
});
// Mendapatkan elemen tombol "Selesai"
var selesaiButton = document.getElementById("selesai-button");
var printButton = document.getElementById("print-button");
var cekmoneyPriceInput = document.getElementById("money-price");

// Menambahkan event listener ke input uang pembayaran
cekmoneyPriceInput.addEventListener("input", function () {
  var cekmoneyPaid = parseFloat(moneyPriceInput.value) || 0;
  var cektotal = parseFloat(totalPriceInput.value) || 0;

  // Mengecek apakah uang pembayaran cukup
  if (cekmoneyPaid >= cektotal) {
    printButton.removeAttribute("disabled");
    selesaiButton.removeAttribute("disabled"); // Aktifkan tombol "Selesai"
  } else {
    printButton.setAttribute("disabled", "disabled");
    selesaiButton.setAttribute("disabled", "disabled"); // Nonaktifkan tombol "Selesai"
  }
});

// Mendapatkan elemen-elemen input dan menghubungkannya dengan variabel
var totalPriceInput = document.getElementById("total-price");
var moneyPriceInput = document.getElementById("money-price");
var moneyReturnInput = document.getElementById("money-return");

// Menambahkan event listener untuk menghitung uang kembalian saat nilai total atau uang pembayaran berubah

totalPriceInput.addEventListener("input", calculateMoReturn);
moneyPriceInput.addEventListener("input", calculateMoReturn);

function calculateMoReturn() {
  // Mendapatkan nilai total dan uang pembayaran dari input
  var total = parseFloat(totalPriceInput.value) || 0;
  var moneyPaid = parseFloat(moneyPriceInput.value) || 0;

  // Menghitung uang kembalian
  if(moneyPaid > 0){
    var change = moneyPaid - total;
    // Menampilkan uang kembalian pada input uang kembalian
    moneyReturnInput.value = change.toFixed(0); // Menampilkan uang kembalian dengan 2 desimal
  }else{
    moneyReturnInput.value = 0;
  }
}

// fungsi print

</script>
@if(session('TRXPrint'))
<script>

    var transaksi = @json(session('TRXPrint'));

var contentToPrint = `
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 8px;
        }
        .container {
            width: 300px;
            margin: 0 auto;
        }
        .logo {
            text-align: center;
        }
        .logo img {
            max-width: 100px;
        }
        .transaction-details {
            margin-top: 20px;
            text-align: center;
        }
        .transaction-details p {
            margin: 5px 0;
        }
        .item-list {
            margin-top: 20px;
        }
        .item {
            display: flex;
            justify-content: space-evenly;
            margin-bottom: 5px;
            margin-bottom : 4px;
        }
        th,td{
        	font-size : 10px;
        }
        .thead{
        	border-bottom : 1px solid black;
        }
        .closing-text {
            margin-top: 20px;
            text-align: center;
        }
        .jcb{
        	display : flex;
        	justify-content : space-between;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{asset('assets/images/logos/logo-light-1.png')}}" alt="Logo">
        </div>
        <div class="jcb">
            <p>Tanggal Transaksi:</p><p> {{session('TRXPrint')->tanggal_pembayaran}}</p>
        </div>
        <div class="jcb">
            <p>ID Transaksi:</p><p> {{session('TRXPrint')->nomor_transaksi}}</p>
        </div>
        <div class="item-list">
            <table border="0">
            <thead>
            	<tr class="thead">
            		<th>No</th>
            		<th>Nama</th>
            		<th>Jumlah</th>
            		<th>SubTotal</th>
            	</tr>
            </thead>
            	<tbody>
	            @foreach (session('TRXPrint')->menus as $no => $menu)
	            	<tr>
	            		<td>{{$no+1}}</td>
		                <td>{{$menu->nama }}</td>
		                <td>{{ $menu->pivot->harga }}</td>
		                <td>{{ $menu->pivot->quantity }})</td>
		            </tr>
	            @endforeach
	            </tbody>
           	</table>
        </div>
        <div class="jcb">
            <p>Total Pembayaran:</p><p> {{session('TRXPrint')->total_pembayaran}}</p>
        </div>
        <div class="jcb">
            <p>Uang Pembayaran:</p><p> {{session('TRXPrint')->uang_pembayaran}}</p>
        </div>
        <div class="jcb">
            <p>Kembalian:</p><p> {{session('TRXPrint')->kembalian}}</p>
        </div>
        <div class="closing-text">
            <p>Terima kasih atas kunjungan Anda!</p>
        </div>
    </div>
</body>
</html>
`;
console.log(contentToPrint);

// Otomatis cetak setelah halaman dimuat
    window.onload = function() {
        var printWindow = window.open('', '', 'width=600,height=600');
        printWindow.document.open();
        printWindow.document.write(contentToPrint);
        printWindow.document.close();
        printWindow.print();
        printWindow.close();
    };


</script>
@php session()->forget('TRXPrint'); @endphp
@endif

@endpush
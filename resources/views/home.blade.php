<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="icon" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Programmer</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <!--datatable-->
    <!-- Other meta tags, CSS files, etc. -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>

  </head>

  <body>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="wrapper d-flex align-items-stretch">
      <div class="content">
      <div class="form">
        <form action="/" method="POST">
          @csrf
            <div class="row row-cols-2 mb-5">
                <div class="col pb-2"> 
                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                          <label for="inputPassword6" class="col-form-label">No. Transaksi</label>
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control" name="transaksi" value="{{ $transaksi }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="col"> 
                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                          <label for="inputPassword6" class="col-form-label">Customer</label>
                        </div>
                        <div class="col-6">
                            <input class="form-control" list="datalistOptions" id="namaCustInput" placeholder="Cari Customer" name="nama_cust" required>
                            <datalist id="datalistOptions">
                                @foreach ($cust as $custs)
                                    <option value="{{ $custs->kode_customer }}">{{ $custs->nama_customer }}</option>
                                @endforeach
                            </datalist>
                        </div>
                      </div>
                </div>
                <div class="col"> 
                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                          <label for="inputPassword6" class="col-form-label">Tgl. Transaksi</label>
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control" name="no_transaksi" value="{{ $tanggalSaatIni }}" readonly>
                        </div>
                      </div>
                </div>
                <div class="col"> 
                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                          <label for="inputPassword6" class="col-form-label">Alamat</label>
                        </div>
                        <div class="col-6">
                          <input type="text" class="form-control" name="alamat" id="alamatInput">
                        </div>
                      </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="tableTrans">
                    <thead class="table-light">
                        <tr>
                            <th style="width:50px"> No Urut </th>
                            <th style="width:100px"> Tgl. Trans </th>
                            <th style="width:100px"> Kode. Brg </th>
                            <th style="width:200px"> Nama Brg </th>
                            <th style="width:50px"> QTY </th>
                            <th style="width:100px"> Harga </th>
                            <th style="width:200px"> Sub Total </th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td><input type="text" class="input-brg"  name=urut[] value="1"></td>
                                <td><input type="text" class="input-brg" name="tgl_barang[]" value="{{ $tanggalSaatIni }}"></td>
                                <td><input type="text" class="input-brg" name="kodebrg[]" id="kodeBrg" value="" readonly></td>
                                <td>
                                    <input class="input-brg" list="datalistBarang" id="namaBrgInput" placeholder="Nama barang" name="namabrg[]">
                                    <datalist id="datalistBarang">
                                        @foreach ($barang as $brg)
                                            <option value="{{ $brg->nama_barang }}">
                                        @endforeach
                                    </datalist>
                                </td>
                                <td><input type="text" class="input-brg qty-input" name="qty[]" id="jumlah"></td>
                                <td><input type="text" class="input-brg" name="harga[]" id="hrgBrg" readonly></td>
                                <td><input type="text" class="input-brg" name="subtotal[]" id="subTotal" value="" readonly></td>
                            </tr>

                    </tbody>
                </table>
            </div>
            <div class="d-flex align-items-end flex-column mb-3">
                <div class="row g-3 align-items-end">
                    <div class="col-md-6">
                      <label class="col-form-label">Total</label>
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="total" value="" id="total" readonly>
                    </div>
                </div>
                <div class="row g-3 align-items-end">
                    <div class="col-md-6">
                      <label class="col-form-label">Bayar</label>
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="bayar" id="bayarInput" value="">
                    </div>
                </div>
              </div>
            <div class="d-flex align-items-end flex-column mb-3">
                <div class="row g-3 align-items-end">
                    <div class="col-md-6">
                      <label class="col-form-label">Uang Kembali</label>
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="kembali" id="kembalian" value="" readonly>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-end flex-column mb-3">
                <div class="row g-3 align-items-end">
                    <div class="col-md-6">
                      <input type="submit" value="Cetak Transaksi"> 
                    </div>
                </div>
            </div>
          </form>
      </div>

      <!-- start modal -->  
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">History Transaksi</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No Transaksi</th>
                        <th>Tgl Transaksi</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="historyTableBody">
                   
                </tbody>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal History-->      

      <!-- start modal Retur -->

      <div class="modal fade" id="returModal" tabindex="-1" aria-labelledby="returModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="returModalLabel">Retur Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="returForm">
                        <div class="form-group">
                            <label for="qtyRetur">Jumlah Barang Diretur</label>
                            <input type="number" class="form-control" id="qtyRetur" name="qtyRetur">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="simpanRetur">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    
      <!-- end modal Retur -->
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script>
    <script>
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

      document.addEventListener('DOMContentLoaded', function() {
          const customerData = @json($cust);
          const barangData = @json($barang);

          function addNewRow() {
            const table = document.getElementById('tableTrans').getElementsByTagName('tbody')[0];
            const rowCount = table.rows.length + 1;
            const newRow = table.insertRow();
            const dataListId = 'datalistBarang_' + rowCount;
            newRow.innerHTML = `
            <td><input type="text" class="input-brg" name=urut[] value="${rowCount}"></td>
            <td><input type="text" class="input-brg" name=tgl_barang[] value="{{ $tanggalSaatIni }}"></td>
            <td><input type="text" class="input-brg" name="kodebrg[]" value="" readonly></td>
            <td>
                <input class="input-brg" list="${dataListId}" placeholder="Nama barang" name="namabrg[]">
                <datalist id="${dataListId}">
                </datalist>
            </td>
            <td><input type="text" class="input-brg qty-input" name="qty[]" onkeypress="if(event.key === 'Enter'){ addNewRow(); event.preventDefault(); }"></td>
            <td><input type="text" class="input-brg" name="harga[]" readonly></td>
            <td><input type="text" class="input-brg" name="subtotal[]" value="" readonly></td>
            `;
            attachEventListeners(newRow);

            const dataList = document.getElementById(dataListId);
            dataList.innerHTML = '';

            barangData.forEach(barang => {
                const option = document.createElement('option');
                option.value = barang.nama_barang;
                dataList.appendChild(option);
            });
          }

          function attachEventListeners(row) {
              const namaBrgInput = row.querySelector('[name="namabrg[]"]');
              const qtyInput = row.querySelector('.qty-input');

              namaBrgInput.addEventListener('input', function() {
                const selectedBarang = this.value;
                const kodeBrgInput = row.querySelector('[name="kodebrg[]"]');
                const hargaInput = row.querySelector('[name="harga[]"]');
                const barang = barangData.find(b => b.nama_barang === selectedBarang);

                if (barang) {
                    kodeBrgInput.value = barang.kode_barang;
                    hargaInput.value = barang.harga;
                } else {
                    kodeBrgInput.value = '';
                    hargaInput.value = '';
                }
            });

              qtyInput.addEventListener('input', function() {
                  const jumlahBarang = parseInt(this.value);
                  const hargaBarang = parseFloat(row.querySelector('[name="harga[]"]').value);
                  const subTotalInput = row.querySelector('[name="subtotal[]"]');
                  const totalInput = document.getElementById('total');
                  const namaBrgInput = row.querySelector('[name="namabrg[]"]');
                  const barang = barangData.find(b => b.nama_barang === namaBrgInput.value);

                  if (barang) {
                      if (jumlahBarang > barang.stok) {
                          subTotalInput.value = "stok tinggal "+barang.stok;
                          totalInput.value = 0;
                      } else if (jumlahBarang < 0) {
                          subTotalInput.value = "tidak boleh kurang dari 0!";
                          totalInput.value = 0;
                      } else if (!isNaN(jumlahBarang) && !isNaN(hargaBarang)) {
                          subTotalInput.value = jumlahBarang * hargaBarang;
                          calculateTotal();
                      } else {
                          subTotalInput.value = 'NaN';
                      }
                  }
              });

              qtyInput.addEventListener('keypress', function(event) {
                  if (event.key === 'Enter') {
                      event.preventDefault();
                      addNewRow();
                  }
              });
          }

          function calculateTotal() {
              const subTotalInputs = document.querySelectorAll('[name="subtotal[]"]');
              let total = 0;

              subTotalInputs.forEach(input => {
                  const subTotal = parseFloat(input.value);
                  if (!isNaN(subTotal)) {
                      total += subTotal;
                  }
              });

              document.getElementById('total').value = total;
          }

          document.querySelectorAll('.qty-input').forEach(input => {
              attachEventListeners(input.closest('tr'));
          });

          document.getElementById('namaCustInput').addEventListener('input', function() {
              const selectedCustomer = this.value;
              const alamatInput = document.getElementById('alamatInput');
              const customer = customerData.find(cust => cust.kode_customer === selectedCustomer);

              if (customer) {
                  alamatInput.value = customer.alamat;
              } else {
                  alamatInput.value = '';
              }
          });

          document.getElementById('bayarInput').addEventListener('input', function() {
              const bayar = parseFloat(this.value);
              const total = parseFloat(document.getElementById('total').value);
              const kembalian = document.getElementById('kembalian');

              if (!isNaN(bayar) && !isNaN(total)) {
                  kembalian.value = bayar - total;
              } else {
                  kembalian.value = 'gagal';
              }
          });

          @if(session('success'))
            Swal.fire({
                title: 'Sukses',
                text: '{{ session('success') }}',
                icon: 'success'
            });
          @endif

          $('#namaCustInput').on('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    const kodeCust = $(this).val();
                    console.log('Customer code:', kodeCust);

                    $.ajax({
                      url: `/historyCust/${kodeCust}`,
                        type: 'GET',
                        data: { nama_cust: kodeCust },
                        success: function(response) {
                          console.log(response);
                            let historyTableBody = $('#historyTableBody');
                            historyTableBody.empty();

                            if (response.length > 0) {
                                response.forEach(detail_transaksi => {
                                    historyTableBody.append(`
                                        <tr>
                                            <td>${detail_transaksi.no_transaksi}</td>
                                            <td>${detail_transaksi.tgl_transaksi}</td>
                                            <td>${detail_transaksi.nama_barang}</td>
                                            <td>${detail_transaksi.qty}</td>
                                            <td>${detail_transaksi.harga}</td>
                                            <td>${detail_transaksi.total}</td>
                                            <td><a href="" type="button" class="btn btn-warning btn-sm returBtn" data-id_transaksi="${detail_transaksi.id_transaksi}" data-toggle="modal" data-target="#returModal">Retur</a></td>
                                        </tr>
                                    `);
                                });
                            } else {
                                historyTableBody.append('<tr><td colspan="5" class="text-center">Tidak ada riwayat transaksi</td></tr>');
                            }

                            $('#exampleModal').modal('show');
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', xhr.responseText);
                            alert('Error retrieving customer history');
                        }
                    });
                }
            });
            $(document).on('click', '.returBtn', function() {
                var idTransaksi = $(this).data('id_transaksi');
                console.log(idTransaksi);
                $('#returForm').data('id_transaksi', idTransaksi);
            });

            $(document).on('click', '#simpanRetur', function() {
                var id_transaksi = $('#returForm').data('id_transaksi');
                var qtyRetur = $('#qtyRetur').val();

                var formData = {
                    _method: 'PUT',
                    qtyRetur: qtyRetur
                };

                $.ajax({
                    url: `/retur/${id_transaksi}`,
                    method: 'PUT',
                    data: formData,
                    success: function(response) {
                        $('#returModal').modal('hide');
                        alert('Retur berhasil disimpan!');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Terjadi kesalahan saat menyimpan retur.');
                    }
                });
            });
      });
  </script>
  </body>
</html>

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- <script src="{{asset('dist/js/pages/Signature.js')}}"></script> -->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title></title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('dist/css/sppadoc.css')}}">
    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  </head>
  <body>
    <form id="form-sppadoc">
      @csrf
      <table style="width:100%; height:100%">
        <tbody>
          <tr>
            <td align="center">
              <div class="templateContainer">
                <table align="center">
                  <tr>
                    <td style="padding-top:30px;">
                      <b>
                        <span>SURAT PERMOHONAN PENUTUPAN ASURANSI (SPPA)</span>
                      </b>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top: 10px;text-align:center;">
                      <u>
                        <span id="span-product"></span>
                      </u>
                    </td>
                  </tr>
                </table>
                <table style="width:100%; height:100%;">
                  <tbody>
                    <!-- Nomor SPPA -->
                    <tr>
                      <td>
                        <table class="tblContentRow" style="table-layout:fixed;margin-top:20px;">
                          <tbody>
                            <tr>
                              <td class="tdLabel">
                                <span>
                                  Nomor SPPA
                                </span>
                              </td>
                              <td class="tdDot">
                                <span>
                                  :
                                </span>
                              </td>
                              <td class="tdValue">
                                <span id="span-sppano">
                                  
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Nomor SPPA -->

                    <!-- Product -->
                    <tr>
                      <td>
                        <table class="tblContentRow">
                          <tbody>
                            <tr>
                              <td class="tdLabel">
                                <span>
                                  Produk
                                </span>
                              </td>
                              <td class="tdDot">
                                <span>
                                  :
                                </span>
                              </td>
                              <td class="tdValue">
                                <span id="span-coverage">
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Product -->

                    <!-- Nama Lengkap -->
                    <tr>
                      <td>
                        <table align="left" class="tblContentRow">
                          <tbody>
                            <tr>
                              <td class="tdLabel">
                                <span>
                                  Nama Lengkap
                                </span>
                              </td>
                              <td class="tdDot">
                                <span>
                                  :
                                </span>
                              </td>
                              <td class="tdValue">
                                <span id="span-nama">
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Nama Lengkap -->

                    <!-- Alamat Lengkap -->
                    <tr>
                      <td>
                        <table class="tblContentRow">
                          <tbody>
                            <tr>
                              <td class="tdLabel">
                                <span>
                                  Alamat Lengkap
                                </span>
                              </td>
                              <td class="tdDot">
                                <span>
                                  :
                                </span>
                              </td>
                              <td class="tdValue">
                                <span id="span-alamat">
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Alamat Lengkap -->

                    <!-- Jangka Waktu Pertanggungan -->
                    <tr>
                      <td>
                        <table class="tblContentRow">
                          <tbody>
                            <tr>
                              <td class="tdLabel">
                                <span>
                                  Jangka Waktu Pertanggungan
                                </span>
                              </td>
                              <td class="tdDot">
                                <span>
                                  :
                                </span>
                              </td>
                              <td class="tdValue">
                                <span id="span-sdate">
                                </span>
                              </td>
                              <td class="tdLabel">
                                <span>
                                  sampai dengan
                                </span>
                              </td>
                              <td class="tdValue">
                                <span id="span-edate">
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Jangka Waktu Pertanggungan -->

                    <!-- Deskripsi Waktu Pertanggungan -->
                    <tr>
                      <td>
                        <table class="deksripsiwaktu">
                          <tbody>
                            <tr>
                              <td class="tdLabel">
                                <span>
                                </span>
                              </td>
                              <td class="tdDot">
                                <span>
                                </span>
                              </td>
                              <td class="tdValue">
                                <span>
                                kedua tanggal tersebut berada pada pukul 12:00 siang waktu setempat dimana obyek pertanggungan berada
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Deskripsi Waktu Pertanggungan -->

                    <!-- Obyek Pertanggungan -->
                    <tr>
                      <td>
                        <table class="tblContentRow">
                          <tbody>
                            <tr>
                              <td class="tdLabel">
                                <span>
                                  <b>Obyek Pertanggungan<b>
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Obyek Pertanggungan -->

                    <!-- Detail Obyek Pertanggungan -->
                    <tr>
                      <td>
                        <table border="0" class="rowDetailObjInfo">
                          <tbody id="tblObjectInfo">
                            
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Detail Obyek Pertanggungan -->

                    <!-- Jaminan -->
                    <tr>
                      <td>
                        <table class="tblContentRow">
                          <tbody>
                            <tr>
                              <td class="tdLabel">
                                <span>
                                  <b>Jaminan<b>
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Jaminan -->

                    <!-- Detail Jaminan -->
                    <tr>
                      <td>
                        <table class="rowDetailObjInfo">
                          <tbody id="tblJaminan"> 
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Detail Jaminan -->

                    <!-- Resiko Sendiri/Deductible -->
                    <tr>
                      <td>
                        <table class="tblContentRow">
                          <tbody>
                            <tr>
                              <td class="tdLabel">
                                <span>
                                  <b>Resiko Sendiri/Deductible<b>
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Resiko Sendiri/Deductible -->

                    <!-- Detail Resiko Sendiri/Deductible -->
                    <tr>
                      <td>
                        <table border="0" class="rowDetailObjInfo">
                          <tbody id="tblDeductible">
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Detail Resiko Sendiri/Deductible -->

                    <!-- Perhitungan Premi -->
                    <tr>
                      <td>
                        <table class="tblContentRow">
                          <tbody>
                            <tr>
                              <td class="tdLabel">
                                <span>
                                  <b>Perhitungan Premi<b>
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Perhitungan Premi -->

                    <!-- Detail Perhitungan Premi -->
                    <tr>
                      <td>
                        <table border="0" class="rowDetailObjInfo" style="width:95%">
                          <tbody id="tblPremiumSimulation">
                            <!-- <tr>
                              <td class="tdTab">
                                <span>
                                </span>
                              </td>
                              <td class="strip">
                                <span>
                                  -
                                </span>
                              </td>
                              <td class="tdLabelObjectInfo" style="text-align:justify; width:68%;">
                                <span style="line-height:25px;">
                                  Kebongkaran (pencurian disertai dengan kekerasan) : 300,000,000 x 0.10000‰ = 30,000.00
                                </span>
                              </td>
                              <td class="tdLabelObjectInfo" style="text-align:center; width:7%;">
                                <span>
                                IDR
                                </span>
                              </td>
                              <td class="tdLabelObjectInfo" style="text-align:right;">
                                <span>
                                50.000.000
                                </span>
                              </td>
                            </tr> -->
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Detail Perhitungan Premi -->

                    <!-- Horizontal Line -->
                    <tr>
                      <td>
                        <table border="0" class="tblContentRow" style="margin-top:0;">
                          <tbody>
                            <tr>
                              <td style="text-align:right; width:74%;">
                                <span>
                                  <b></b>
                                </span>
                              </td>
                              <td style="text-align:center;">
                                <hr style="border: 1px solid black">
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Horizontal Line -->

                    <!-- Summary Detail Perhitungan Premi -->
                    <tr>
                      <td>
                        <table border="0" class="rowDetailObjInfo" >
                          <tbody>
                            <!-- Total Premium -->
                            <tr>
                              <td class="tdTab">
                                <span>
                                </span>
                              </td>
                              <td class="strip">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdLabelObjectInfo" style="text-align:right; width:68%;">
                                <span>
                                  <b>Total Premium</b>
                                </span>
                              </td>
                              <td class="tdLabelObjectInfo" style="text-align:center; width:7%;">
                                <span class="span-currency">
                                </span>
                              </td>
                              <td class="tdLabelObjectInfo" style="text-align:right;">
                                <span id="span-premium">
                                </span>
                              </td>
                            </tr>
                            <!-- End Total Premium -->

                            <!-- Biaya Administrasi -->
                            <tr>
                              <td class="tdTab">
                                <span>
                                </span>
                              </td>
                              <td class="strip">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdLabelObjectInfo" style="text-align:right; width:63%;">
                                <span>
                                  <b>Biaya Administrasi</b>
                                </span>
                              </td>
                              <td class="tdLabelObjectInfo" style="text-align:center; width:7%;">
                              <span class="span-currency">
                                </span>
                              </td>
                              <td class="tdLabelObjectInfo" style="text-align:right;">
                                <span id="span-admfee_stampduty">
                                </span>
                              </td>
                            </tr>
                            <!-- End Biaya Administrasi -->
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Summary Detail Perhitungan Premi -->

                    <!-- Horizontal Line -->
                    <tr>
                      <td>
                        <table border="0" class="tblContentRow" style="margin-top:0;">
                          <tbody>
                            <tr>
                              <td style="text-align:right; width:74%;">
                                <span>
                                  <b></b>
                                </span>
                              </td>
                              <td style="text-align:center;">
                                <hr style="border: 1px solid black">
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Horizontal Line -->

                     <!-- Total Full Perhitungan Premi -->
                     <tr>
                      <td>
                        <table border="0" class="rowDetailObjInfo" >
                          <tbody>
                            <!-- Total -->
                            <tr>
                              <td class="tdTab">
                                <span>
                                </span>
                              </td>
                              <td class="strip">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdLabelObjectInfo" style="text-align:right; width:68%;">
                                <span>
                                  <b>Total</b>
                                </span>
                              </td>
                              <td class="tdLabelObjectInfo" style="text-align:center; width:7%;">
                                <span class="span-currency">
                                </span>
                              </td>
                              <td class="tdLabelObjectInfo" style="text-align:right;">
                                <span id="span-totalpremium">
                                  11.600.000
                                </span>
                              </td>
                            </tr>
                            <!-- End Total Full Perhitungan Premi -->
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Summary Detail Perhitungan Premi -->

                    <!-- Pilihan Penyelesaian Sengketa -->
                    <tr>
                      <td>
                        <table class="tblContentRow">
                          <tbody>
                            <tr>
                              <td class="tdLabel">
                                <span>
                                  Pilihan Penyelesaian Sengketa :
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Pilihan Penyelesaian Sengketa -->

                    <!-- Detail Pilihan Penyelesaian Sengketa -->
                    <tr>
                      <td>
                        <table border="0" class="rowDetailObjInfo">
                          <tbody>
                            <tr>
                              <td class="tdTab">
                                <span>
                                </span>
                              </td>
                              <td class="tdLabelObjectInfo">
                                <span>
                                  <input type="radio" id="laps" name="pilihansengketa">
                                  <label for="laps">Lembaga Alternatif Penyelesaian Sengketa (LAPS) yang terdaftar di OJK</label>
                                </span>
                              </td>
                              <!-- <td class="tdLabelObjectInfo">
                                <span>
                                </span>
                              </td> -->
                            </tr>
                            <tr>
                              <td class="tdTab">
                                <span>
                                </span>
                              </td>
                              <td class="tdLabelObjectInfo">
                                <span>
                                  <input type="radio" id="pengadilan" name="pilihansengketa">
                                  <label for="sengketa">Pengadilan</label>
                                </span>
                              </td>
                              <!-- <td class="tdLabelObjectInfo">
                                <span>
                                </span>
                              </td> -->
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Detail Pilihan Penyelesaian Sengketa -->
                    
                    <!-- Kondisi Kendaraan -->
                    <tr>
                      <td>
                        <table class="tblContentRow">
                          <tbody>
                            <tr>
                              <td class="tdLabel">
                                <span>
                                  Kondisi Kendaraan :
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Kondisi Kendaraan -->

                    <!-- Detail Kondisi Kendaraan -->
                    <tr>
                      <td>
                        <table border="0" class="rowDetailObjInfo">
                          <tbody>
                            <tr>
                              <td class="tdTab">
                                <span>
                                </span>
                              </td>
                              <td class="tdRadioKendaraan" style="width:150px;">
                                <span>
                                  <input type="radio" id="layak" name="kondisikendaraan">
                                  <label for="layak">Layak</label>
                                </span>
                              </td>
                              <td class="tdRadioKendaraan" style="width:200px;">
                                <span>
                                  <input type="radio" id="tidaklayak" name="kondisikendaraan">
                                  <label for="tidaklayak">Tidak Layak</label>
                                </span>
                              </td>
                              <td class="tdRadioKendaraan">
                                <span>
                                  <input type="radio" id="onperbaikan" name="kondisikendaraan">
                                  <label for="onperbaikan">Dalam Perbaikan</label>
                                </span>
                              </td>
                              <!-- <td class="tdLabelObjectInfo">
                                <span>
                                </span>
                              </td> -->
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Detail Kondisi Kendaraan -->

                    <!-- Tempat Survey Object Info -->
                    <tr>
                      <td>
                        <table border="0" class="tblContentRow">
                          <tbody>
                            <tr>
                              <td class="tdLabel" style="width:40px">
                                <span>
                                  Obyek Pertanggungan dapat di survey di :
                                </span>
                              </td>
                              <td class="tdLabelObjectInfo">
                              <input type="text" id="tempatsurvey" name="tempatsurvey" style="width:100%;padding-top:0;" />
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Tempat Survey Object Info -->

                    <!-- Keterangan masa aktif SPPA -->
                    <tr>
                      <td>
                        <table border="0" class="tblContentRow" style="width:95%;">
                          <tbody>
                            <tr>
                              <td class="tdLabel">
                                <span>
                                Surat Permohonan Penutupan Asuransi(SPPA) ini berlaku sampai dengan 15 Februari 2021 sejak tanggal di terbitkan.
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Keterangan masa aktif SPPA -->

                    <!-- Footer -->
                    <tr>
                      <td>
                        <table border="0" class="tblContentRow" style="width:95%;">
                          <tbody>
                            <tr>
                              <td class="tdLabel">
                                <span>
                                  Yang bertanda tangan dibawah ini :
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Footer -->

                    <!-- Detail Footer -->
                    <tr>
                      <td>
                        <table border="0" class="rowDetailObjInfo" style="width:95%;">
                          <tbody>
                            <tr>
                              <td class="tdTab">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdTab" style="vertical-align:top;">
                                <span>
                                  1.
                                </span>
                              </td>
                              <td class="tdValue" style="padding-top:10px;" style="width:95%;">
                                <p class="paragraphFooter">
                                  Menyatakan bahwa keterangan tersebut di atas dibuat dengan sejujurnya dan sesuai dengan keadaan sebenarnya menurut pengetahuan saya atau yang seharusnya saya ketahui.
                                </p>
                              </td>
                            </tr>
                            <tr>
                              <td class="tdTab">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdTab" style="vertical-align:top; padding-top:0;">
                                <span>
                                  2.
                                </span>
                              </td>
                              <td class="tdValue" style="padding-top:10px; padding-top:0;">
                                <p class="paragraphFooter">
                                  Menyadari bahwa keterangan tersebut akan digunakan sebagai dasar dan merupakan bagian yang tidak terpisahkan dari polis yang akan diterbitkan, oleh karenanya ketidakbenarannya dapat mengakibatkan batalnya pertanggungan dan ditolaknya setiap tuntutan ganti rugi oleh Penanggung.
                                </p>
                              </td>
                            </tr>
                            <tr>
                              <td class="tdTab">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdTab" style="vertical-align:top; padding-top:0;">
                                <span>
                                  3.
                                </span>
                              </td>
                              <td class="tdValue" style="padding-top:10px; padding-top:0;">
                                <p class="paragraphFooter">
                                  Memahami bahwa pertanggungan yang diminta ini baru setelah mendapat persetujuan tertulis dari Penanggung.
                                </p>
                              </td>
                            </tr>
                            <tr>
                              <td class="tdTab">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdTab" style="vertical-align:top; padding-top:0;">
                                <span>
                                  4.
                                </span>
                              </td>
                              <td class="tdValue" style="padding-top:10px; padding-top:0;">
                                <p class="paragraphFooter">
                                  Menyatakan bahwa telah mendapatkan penjelasan atas produk yang dibeli dari pihal Penanggung dan telah memahami serta menerima syarat dan ketentuan dari produk tersebut.
                                </p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Detail Footer -->

                    <!-- Tempat dan Tanggal -->
                    <tr>
                      <td>
                        <table border="0" class="tblContentRow" style="width:95%;">
                          <tbody>
                            <tr>
                            <td class="tdLabel" style="width:66%">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdLabel">
                                <span>
                                  Jakarta, 22 Agustus 2021
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Tempat dan Tanggal -->

                    <!-- Canvas Tanda Tangan -->
                    <tr>
                      <td>
                        <table border="0" class="tblContentRow" style="width:95%;">
                          <tbody>
                            <tr>
                              <td class="tdLabel" style="width:58%">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdLabel">
                                <img id="img-ttd"/>
                              </td>
                            </tr>
                            <tr>
                              <td class="tdLabel" style="width:58%">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdLabel" style="padding-top:10px; text-align:center;">
                                <span id="lblNamaTtd" style="text-align:center;"></span>
                              </td>
                            </tr>
                            <tr>
                              <td class="tdLabel" style="width:58%">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdLabel" style="padding-top:10px; text-align:center;">
                                <button id="btnSign">
                                  Sign
                                </button> 
                                <button id="btnClearSign" style="display:none;">
                                  Clear
                                </button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Canvas Tanda Tangan -->

                    <!-- Button Submit Cancel -->
                    <tr>
                      <td>
                        <table border="0" class="rowDetailObjInfo">
                          <tbody>
                            <tr>
                              <td class="tdTab">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdTab" style="vertical-align:top;">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdValue" style="padding-top:10px; width:25%;">
                                <button id="btnSubmit" type="submit">
                                  Submit
                                </button>
                              </td>
                              <td class="tdValue" style="padding-top:10px;">
                                <button id="btnCancel" type="submit">
                                  Cancel
                                </button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Button Submit Cancel -->
                    
                    <!-- Ending Page -->
                    <tr>
                      <td>
                        <table border="0" class="rowDetailObjInfo" style="width:95%;">
                          <tbody>
                            <tr>
                              <td class="tdTab">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdTab" style="vertical-align:top;">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdValue" style="padding-top:10px;" style="width:95%;">
                              </td>
                            </tr>
                            <tr>
                              <td class="tdTab">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdTab" style="vertical-align:top;">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdValue" style="padding-top:10px;" style="width:95%;">
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Ending Page -->
                  </tbody>
                </table>
                <table>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script>
      // signatureCapture();
      var signaturePad;
      $(document).ready(function() {
        var basedataPolicy = @json($Policy['Data']);
        var basedataProfile = @json($Profile['Data']);
        var basedataProduct = @json($Product['Data']);
        var basedataCoverage = @json($Coverage['Data']);
        var datasign = @json($datasign);
        var basedataPremiumSimulation = @json($PremiumSimulation['Data']);
        console.log(datasign);
        $('#span-product').text(basedataPolicy[0]['ProductDesc']);
        $('#span-sppano').text(basedataPolicy[0]['RefNo']);
        $('#span-coverage').text(basedataPolicy[0]['CoverageDesc']);
        $('#span-nama').text(basedataPolicy[0]['InsuredName']);
        $('#span-alamat').text(basedataProfile[0]['Address_1'] + basedataProfile[0]['Address_2'] + basedataProfile[0]['Address_3']);
        $('#span-sdate').text(GetFormattedDate(basedataPolicy[0]['InceptionDate']));
        $('#span-edate').text(GetFormattedDate(basedataPolicy[0]['ExpiryDate']));
        constructObjectInfo(basedataPolicy, basedataProduct);
        constructRisk(basedataPolicy, basedataCoverage);
        constructDeductible(basedataPolicy, basedataCoverage);
        constructPremiumSimulation(basedataPolicy, basedataPremiumSimulation);
        $('.span-currency').text(basedataPolicy[0]['Currency']);
        $('#span-premium').text(number_format(basedataPolicy[0]['Premium'],2,'.',','));
        $('#span-admfee_stampduty').text(number_format(basedataPolicy[0]['ADMFee'] + basedataPolicy[0]['StampDuty'] ,2,'.',','));
        $('#span-totalpremium').text(number_format(basedataPolicy[0]['Premium'] + basedataPolicy[0]['ADMFee'] + basedataPolicy[0]['StampDuty'] ,2,'.',','));
        // console.log(jQuery.isEmptyObject(datasign));
        if (datasign['img'] != ''){
          document.getElementById("img-ttd").src = datasign['img'];
          $('#lblNamaTtd').text(datasign['nama']);
          $('#btnSubmit').attr('style','display:none;');
          $('#btnCancel').attr('style','display:none;');
          $('#btnSign').attr('style','display:none;');
        }
      });

      $('#btnSubmit').click(function(event){
        event.preventDefault();
        Swal.fire({
          title: 'Do you want to save the changes?',
          showCancelButton: true,
          confirmButtonText: 'Submit',
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            // getDataURL();
            submitSPPADoc();
            // Swal.fire({
            //   title: 'Saved!',
            //   text: '',
            //   icon: 'success'
            // }).then((result) => {
            //   if (result.isConfirmed){
            //     // window.location.href = "http://www.google.com";

            //   }
            // })
          }
        })
      });

      $('#btnSign').on('click', function(event){
        event.preventDefault();
        var canvas = '<div id="canvas"><canvas class="roundCorners" id="newSignature" style="border: 1px solid #c4caac;"></canvas></div><br><div><input id="namattd" name="namattd" style="text-align:center;"/> </div>';
        Swal.fire({
          title: "<i>Signature</i>", 
          html: canvas,  
          showCloseButton: true,
          confirmButtonText: "Save",
          denyButtonText: "Clear Signature", 
          showCancelButton: true,
          showLoaderOnConfirm: false,
          allowEscapeKey: false,
          allowOutsideClick: false,
          allowEnterKey: false,
          reverseButtons: true,
        }).then((result) => {
          if (result.isConfirmed){
            console.log(signaturePad.toDataURL());
            document.getElementById("img-ttd").src = signaturePad.toDataURL();
            $('#lblNamaTtd').text($('#namattd').val());
            // console.log( $('#lblNamaTtd').text());
            $('#btnClearSign').removeAttr('style');
          }
        });
        signatureCapture();
      });

      $('#btnClearSign').on('click', function(event){
        event.preventDefault();
        $('#lblNamaTtd').text('');
        document.getElementById("img-ttd").src = '';
        signaturePad.clear();
        $(this).attr('style','display:none;')
      })

      function signatureCapture(){
        signaturePad = new SignaturePad(document.getElementById('newSignature'), {
          backgroundColor: 'rgba(255, 255, 255, 0)',
          penColor: 'rgb(0, 0, 0)'
        });
      }

      function submitSPPADoc(){
        try{
          if (imgttd == ''){
            throw 'Please Sign SPPA Document First.';
          }
          var imgttd = document.getElementById("img-ttd").src;
          var name = $('#lblNamaTtd').text();
          var refno = $('#span-sppano').text();
          let _token = $('meta[name="csrf-token"]').attr('content');

          console.log(_token);

          $.ajax({
            type: "POST",
            url: "{{ route('submitsppadoc') }}", 
            data: {
              Imgttd: imgttd,
              Name: name,
              RefNo: refno,
              _token: _token
            },
            }).done(function(msg) {
              console.log(msg);
            }).fail(function(xhr, status, error) {
              console.log(xhr);
              var message = xhr.responseJSON['message'];
              toastMessage('400',message)
          });
        }catch(err){
          toastMessage('400',err);
        }
      }

      function constructObjectInfo(basedataPolicy, basedataProduct){
        var template
        for (i=0; i < 15; i++){
          if (basedataPolicy[0]['ValueID' + (i + 1)] != '' || basedataPolicy[0]['ValueDesc' + (i + 1)] != ''){
            for (j=0; j < 15; j++){
              if (basedataPolicy[0]['FLDID' + (i + 1)] == basedataProduct[0]['FLDID' + (j + 1)]){
                if (i == 0){
                  template = '<tr><td class="tdTab"></td><td class="strip"><span>-</span></td><td style="text-align:left;word-wrap:break-word;width:30%;vertical-align:top;padding-top:10px"><span id="span-fldid">'+ basedataProduct[0]['FLDTAG' + (i + 1)] +'</span></td><td class="titik"><span>:</span></td><td class="tdValueObjectInfo"><span id="span-valueobjectinfo">'+ basedataPolicy[0]['ValueDesc' + (i + 1)] +'</span></td></tr>'
                }else{
                  template = template + '<tr><td class="tdTab"></td><td class="strip"><span>-</span></td><td style="text-align:left;word-wrap:break-word;width:30%;vertical-align:top;padding-top:10px"><span id="span-fldid">'+ basedataProduct[0]['FLDTAG' + (i + 1)] +'</span></td><td class="titik"><span>:</span></td><td class="tdValueObjectInfo"><span id="span-valueobjectinfo">'+ basedataPolicy[0]['ValueDesc' + (i + 1)] +'</span></td></tr>'
                }
              }
            }
          }
        }
        $('#tblObjectInfo').append(template);
      }

      function constructRisk(basedataPolicy, basedataCoverage){
        var template
        for (i=0; i < basedataCoverage[0]['CoverageDetail'].length; i++){
          if (i == 0){
            template = '<tr><td class="tdTab"><span></span></td><td class="strip"><span>-</span></td><td class="tdLabelObjectInfo"><span>'+ basedataCoverage[0]['CoverageDetail'][i]['Description'] +'</span></td></tr>'
          }else{
            template = template + '<tr><td class="tdTab"><span></span></td><td class="strip"><span>-</span></td><td class="tdLabelObjectInfo"><span>'+ basedataCoverage[0]['CoverageDetail'][i]['Description'] +'</span></td></tr>'
          }
        }
        $('#tblJaminan').append(template);
      }

      function constructDeductible(basedataPolicy, basedataCoverage){
        var template
        for (i=0; i < basedataCoverage[0]['CoverageDeductible'].length; i++){
          if (i == 0){
            template = '<tr><td class="tdTab"><span></span></td><td class="strip"><span>-</span></td><td class="tdLabelObjectInfo"><span>'+ basedataCoverage[0]['CoverageDeductible'][i]['Description'] +'</span></td></tr>'
          }else{
            template = template + '<tr><td class="tdTab"><span></span></td><td class="strip"><span>-</span></td><td class="tdLabelObjectInfo"><span>'+ basedataCoverage[0]['CoverageDeductible'][i]['Description'] +'</span></td></tr>'
          }
        }
        $('#tblDeductible').append(template);
      }

      function constructPremiumSimulation(basedataPolicy, basedataPremiumSimulation){
        var template;
        var premium;
        for (i=0; i < basedataPremiumSimulation.length; i++){
          premium = number_format(basedataPremiumSimulation[i]['Premium'],2,'.',',');
          if (i == 0){
            template = '<tr><td class="tdTab"><span></span></td><td class="strip"><span>-</span></td><td class="tdLabelObjectInfo" style="text-align:justify;width:68%"><span style="line-height:25px;">'+ basedataPremiumSimulation[i]['Risk'] +' : '+ basedataPremiumSimulation[i]['SPremium'] +'</span></td><td class="tdLabelObjectInfo" style="text-align:center;width:7%"><span>'+ basedataPolicy[0]['Currency'] +'</span></td><td class="tdLabelObjectInfo" style="text-align:right"><span>'+ premium +'</span></td></tr>';
          }else{
            template = template + '<tr><td class="tdTab"><span></span></td><td class="strip"><span>-</span></td><td class="tdLabelObjectInfo" style="text-align:justify;width:68%"><span style="line-height:25px;">'+ basedataPremiumSimulation[i]['Risk'] +' : '+ basedataPremiumSimulation[i]['SPremium'] +'</span></td><td class="tdLabelObjectInfo" style="text-align:center;width:7%"><span>'+ basedataPolicy[0]['Currency'] +'</span></td><td class="tdLabelObjectInfo" style="text-align:right"><span>'+ premium +'</span></td></tr>';
          }
        }
        $('#tblPremiumSimulation').append(template);
      }

      function GetFormattedDate(datestring) {
        var d = new Date(datestring);
        var month = d.getMonth() + 1;
        // if (month < 10) {
        //   month = '0' + month;
        // }
        var day = d.getDate();
        // if (day < 10) {
        //   day = '0' + day;
        // }
        var year = d.getFullYear();
        return day + " " + GetMonthDesc(month) + " " + year;
      }

      function GetMonthDesc(month){
        var monthdesc;
        switch(month){
          case 1:
            monthdesc = 'Januari';
            break;
          case 2:
            monthdesc = 'Februari';
            break;
          case 3:
            monthdesc = 'Maret';
            break;
          case 4:
            monthdesc = 'April';
            break;
          case 5:
            monthdesc = 'Mei';
            break;
          case 6:
            monthdesc = 'Juni';
            break;
          case 7:
            monthdesc = 'Juli';
            break;
          case 8:
            monthdesc = 'Agustus';
            break;
          case 9:
            monthdesc = 'September';
            break;
          case 10:
            monthdesc = 'Oktober';
            break;
          case 11:
            monthdesc = 'November';
            break;
          case 12:
            monthdesc = 'Desember';
            break;
        }
        return monthdesc;
      }

      function number_format(number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
      }
    </script>
    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- General For Web Portal MW -->
    <script src="{{asset('dist/js/pages/webportal.js')}}"></script>
  </body>
</html>
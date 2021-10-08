<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="{{asset('dist/css/sppadoc.css')}}"> -->
    <!-- SweetAlert2 -->
    <!-- <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}"> -->
    <style>
      body {
        /* font-size:14px; */
        font-family:'Quicksand', 'Helvetica Neue', Arial;
        /* background-color:#eee; */
        color:#454545
      }

      #headerTemplate{
        vertical-align:top;
        padding-top:20px;
        padding-left:20px;
        padding-bottom:20px;
        padding-right:20px;
        height:100%;
        width:100%
      }

      .templateContainer{
        background-color:#fff;
        width:790px;
      }

      .tdLabel{
        text-align:left;
        max-width:100%;
        width:200px;
        word-wrap:break-word;
        padding-left:15px;
      }

      .tdDot{
        width:15px;
      }

      .tdValue{
        text-align:left;
        max-width:100%;
        word-wrap:break-word;
      }

      .tblContentRow{
        table-layout:fixed;
        margin-top:20px;
        width:95%;
        /* border: 1px solid black; */
      }

      .deksripsiwaktu{
        table-layout:fixed;
        margin-top:10px;
        width:95%;
      }

      .tdLabelObjectInfo{
        text-align:left;
        max-width:100%;
        word-wrap:break-word;
        width:35px;
        vertical-align:top;
        padding-top:10px;
      }

      .tdValueObjectInfo{
        text-align:left;
        max-width:100%;
        width:100px;
        word-wrap:break-word;
        vertical-align:top;
        padding-top:10px;
        padding-left:10px;
      }

      .tdTab{
        width: 3%;
        white-space: nowrap;
        padding-top:10px;
      }

      .strip{
        width: 3%;
        white-space: nowrap;
        vertical-align:top;
        padding-top:10px;
      }

      .titik{
        text-align:left;
        /* max-width:100%; */
        width:5px;
        vertical-align:top;
        padding-top:10px;
      }

      .rowDetailObjInfo{
        /* table-layout:fixed; */
        width:95%;
        /* border: 1px solid black; */
      }

      .tdRadioKendaraan{
        text-align:left;
        vertical-align:top;
        padding-top:10px;
        white-space: nowrap
      }

      .paragraphFooter{
        text-align: justify;
      }
    </style>
  </head>
  <body style="{{ $payload['option_sengketa'] == '' ? 'background-color:#eee;' : '' }}">
    <form id="form-sppadoc">
      @csrf
      <table style="width:100%; height:100%">
        <tbody>
          <tr>
            <td align="{{ $payload['option_sengketa'] == '' ? 'center' : 'left' }}">
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
                        <span id="span-product">{{$payload['ProductDesc']}}</span>
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
                                  {{$payload['RefNo']}}
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
                                  {{$payload['CoverageDesc']}}
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
                                  {{$payload['InsuredName']}}
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
                        <table border="0" class="tblContentRow">
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
                                {{$payload['Address_1'].$payload['Address_2'].$payload['Address_3']}}
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <!-- End Alamat Lengkap -->
                    <!-- waktu Pertanggungan -->
                    @if ($payload['SubmitDateF'] === false)
                      <!-- Jangka Waktu Pertanggungan -->
                      <tr>
                        <td>
                          <table border="0" class="tblContentRow">
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
                                    {{ $payload['dateInception'] }}
                                  </span>
                                </td>
                                <td class="tdLabel">
                                  <span>
                                    sampai dengan
                                  </span>
                                </td>
                                <td class="tdValue">
                                  <span id="span-edate">
                                  {{ $payload['dateExpiry'] }}
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
                          <!-- <table border="1px" class="tblContentRow"> -->
                          <table border="0" class="deksripsiwaktu">
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
                    @else
                      <!-- Jangka Waktu Pertanggungan With Submit Date -->
                      <tr>
                        <td>
                          <table border="0" class="tblContentRow">
                            <tbody>
                              <tr>
                                <td class="tdLabel">
                                  <span>
                                    Masa Waktu Pertanggungan
                                  </span>
                                </td>
                                <td class="tdDot">
                                  <span>
                                    :
                                  </span>
                                </td>
                                <td class="tdValue">
                                  <span id="span-sdate">
                                    {{ $payload['periodDays'] }} hari
                                  </span>
                                </td>
                                <!-- <td class="tdLabel">
                                  <span>
                                    sampai dengan
                                  </span>
                                </td>
                                <td class="tdValue">
                                  <span id="span-edate">
                                  {{ $payload['dateExpiry'] }}
                                  </span>
                                </td> -->
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <!-- End Jangka Waktu Pertanggungan With Submit Date -->

                      <!-- Deskripsi Waktu Pertanggungan With Submit Date -->
                      <tr>
                        <td>
                          <!-- <table border="1px" class="tblContentRow"> -->
                          <table border="0" class="deksripsiwaktu">
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
                                  masa waktu tersebut berada pukul 12:00 siang waktu setempat dimana obyek pertanggungan berada
                                  </span>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <!-- End Deskripsi Waktu Pertanggungan With Submit Date -->
                    @endif
                    <!-- End waktu Pertanggungan -->

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
                            @for ($i = 1; $i <= 15; $i++)
                              @if ($payload['FLDTAG'.($i + 1)] != '')
                                <tr>
                                  <td class="tdTab">
                                  </td>
                                  <td class="strip">
                                    <span>-</span>
                                  </td>
                                  <td style="text-align:left;word-wrap:break-word;width:30%;vertical-align:top;padding-top:10px">
                                    <span id="span-fldid">{{$payload['FLDTAG'.($i + 1)]}}</span>
                                  </td>
                                  <td class="titik">
                                    <span>:</span>
                                  </td>
                                  <td class="tdValueObjectInfo">
                                    <span id="span-valueobjectinfo">{{$payload['ValueDesc'.($i + 1)]}}</span>
                                  </td>
                                </tr>
                              @endif
                            @endfor
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
                            @foreach ($payload['CoverageDetail'] as $risk)
                              <tr>
                                <td class="tdTab">
                                  <span></span>
                                </td>
                                <td class="strip">
                                  <span>-</span>
                                </td>
                                <td class="tdLabelObjectInfo">
                                  <span>{{ $risk['Description'] }}</span>
                                </td>
                              </tr>
                            @endforeach 
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
                            @foreach ($payload['CoverageDeductible'] as $deductible)
                              <tr>
                                <td class="tdTab">
                                  <span></span>
                                </td>
                                <td class="strip">
                                  <span>-</span>
                                </td>
                                <td class="tdLabelObjectInfo">
                                  <span>{{ $deductible['Description'] }}</span>
                                </td>
                              </tr>
                            @endforeach 
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
                            @foreach ($payload['PremiumSimulation'] as $premisimulation)
                              <tr>
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
                                    {{ $premisimulation['Risk']. ' : ' .$premisimulation['SPremium'] }}
                                  </span>
                                </td>
                                <td class="tdLabelObjectInfo" style="text-align:center; width:7%;">
                                  <span>
                                    {{ $payload['Currency'] }}
                                  </span>
                                </td>
                                <td class="tdLabelObjectInfo" style="text-align:right;">
                                  <span>
                                    {{ number_format($premisimulation['Premium'],2) }}
                                  </span>
                                </td>
                              </tr>
                            @endforeach
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
                                  {{ $payload['Currency'] }}
                                </span>
                              </td>
                              <td class="tdLabelObjectInfo" style="text-align:right;">
                                <span id="span-premium">
                                  {{ number_format($payload['Premium'],2) }}
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
                                 {{ $payload['Currency'] }}
                                </span>
                              </td>
                              <td class="tdLabelObjectInfo" style="text-align:right;">
                                <span id="span-admfee_stampduty">
                                  {{ number_format($payload['ADMFee'] + $payload['StampDuty'],2) }}
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
                                {{ number_format($payload['Premium'] + $payload['ADMFee'] + $payload['StampDuty'],2) }}
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
                    @if ($payload['option_sengketa'] == '')
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
                                    <input type="radio" id="laps" value="Lembaga Alternatif Penyelesaian Sengketa (LAPS) yang terdaftar di OJK" name="pilihansengketa">
                                    <label for="laps">Lembaga Alternatif Penyelesaian Sengketa (LAPS) yang terdaftar di OJK</label>
                                  </span>
                                </td>
                              </tr>
                              <tr>
                                <td class="tdTab">
                                  <span>
                                  </span>
                                </td>
                                <td class="tdLabelObjectInfo">
                                  <span>
                                    <input type="radio" id="pengadilan" value="Pengadilan" name="pilihansengketa">
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
                    @else
                      <tr>
                        <td>
                          <table border="0" class="rowDetailObjInfo">
                            <tbody id="tblDeductible">
                              <tr>
                                <td class="tdTab">
                                  <span></span>
                                </td>
                                <td class="strip">
                                  <span>-</span>
                                </td>
                                <td class="tdLabelObjectInfo">
                                  <span>{{ $payload['option_sengketa'] }}</span>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    @endif
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
                    @if ($payload['option_sengketa'] == '')
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
                                    <input type="radio" id="layak" value="Layak" name="kondisikendaraan">
                                    <label for="layak">Layak</label>
                                  </span>
                                </td>
                                <td class="tdRadioKendaraan" style="width:200px;">
                                  <span>
                                    <input type="radio" id="tidaklayak" value="Tidak Layak" name="kondisikendaraan">
                                    <label for="tidaklayak">Tidak Layak</label>
                                  </span>
                                </td>
                                <td class="tdRadioKendaraan">
                                  <span>
                                    <input type="radio" id="onperbaikan" value="Dalam Perbaikan" name="kondisikendaraan">
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
                    @else
                      <tr>
                        <td>
                          <table border="0" class="rowDetailObjInfo">
                            <tbody id="tblDeductible">
                              <tr>
                                <td class="tdTab">
                                  <span></span>
                                </td>
                                <td class="strip">
                                  <span>-</span>
                                </td>
                                <td class="tdLabelObjectInfo">
                                  <span>{{ $payload['kondisi_kendaraan'] }}</span>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    @endif
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
                              <td class="tdLabelObjectInfo" style="padding-top:0px;">
                                @if ($payload['option_sengketa'] == '')
                                  <input type="text" id="tempatsurvey" name="tempatsurvey" style="width:100%;padding-top:0;" />
                                @else
                                  <span>{{ $payload['tempat_survey'] }}</span>
                                @endif
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
                                Surat Permohonan Penutupan Asuransi(SPPA) ini berlaku sampai dengan {{ $payload['dateExpiryDocument'] }} sejak tanggal di terbitkan.
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
                                  Jakarta, {{ $payload['dateNow'] }}
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
                                @if ($payload['img'] == '')
                                  <img id="img-ttd"/>
                                @else
                                  <img id="img-ttd" src="{{ $payload['img'] }}"/>
                                @endif
                              </td>
                            </tr>
                            <tr>
                              <td class="tdLabel" style="width:58%">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdLabel" style="padding-top:10px; text-align:center;">
                                <span id="lblNamaTtd" style="text-align:center;">{{ $payload['nama'] }}</span>
                              </td>
                            </tr>
                            <tr>
                              <td class="tdLabel" style="width:58%">
                                <span>
                                  
                                </span>
                              </td>
                              <td class="tdLabel" style="padding-top:10px; text-align:center;">
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
                              @if ($payload['option_sengketa'] == '')
                                <td class="tdValue" style="padding-top:10px; width:25%;">
                                  <button id="btnSubmit" type="submit">
                                    Submit
                                  </button>
                                  <!-- <button id="btnTestFrame" type="submit">
                                    Test
                                  </button> -->
                                </td>
                                <td class="tdValue" style="padding-top:10px;">
                                  <button id="btnCancel" type="submit">
                                    Cancel
                                  </button>
                                </td>
                              @endif
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
    @yield('scriptpage')
  </body>
</html>
// JS pagination table
$(document).ready(function() {
  $('#example1').DataTable( {
      "pagingType": "full_numbers"
  } );
} );

// JS alert
$(document).ready(function(){
  $("#clickbtn").click(function(){
    alert("Are you sure?");
  });
});

//  Pholder dan Insured For SPPA
let nama1='';
let nama2='';

function yow(nama1,nama2){

    if (nama1!='' && nama2!=''){   
      if(nama1==nama2){
        $('#LongInsured').val(nama1);
      }else{
        $('#LongInsured').val(nama1 + "QQ " + nama2);
      }
    } else if (nama1 ==''){
      $('#LongInsured').val(nama2);
    } else {
        $('#LongInsured').val(nama1);
        nama1='';
        nama2='';
    }
}
$('#HolderID').on('change', function() {
  var selected = $("#HolderID option:selected").html();
    nama1 = $.trim(selected);
    yow(nama1,nama2);
  });

  $('#InsuredID').on('change', function() {
    var selected = $("#InsuredID option:selected").html();
    nama2 = $.trim(selected);
    yow(nama1,nama2);
  });
  

// JS full name in profile
var firstname = document.getElementById('FirstName');
var middname = document.getElementById('MiddleName');
var lsatname = document.getElementById('LastName');
var kata1 = '';
var kata2 = '';
var kata3 = '';

wpcomment.onkeyup  = function(){
    var kata1 = this.value;
    document.getElementById('hihi').innerHTML='';
    document.getElementById('hihi').innerHTML=kata1;
    $("#akhir").val($("#prevCom").text());
}

wpcomment1.onkeyup = function(){
    var kata2 = this.value;
    document.getElementById('jojo').innerHTML='';
    document.getElementById('jojo').innerHTML=kata1+' '+kata2;
    $("#akhir").val($("#prevCom").text());
}

wpcomment2.onkeyup = function(){
    var kata3 = this.value;
    document.getElementById('xiix').innerHTML='';
    document.getElementById('xiix').innerHTML=kata1+' '+kata2+' '+kata3;
    $("#akhir").val($("#prevCom").text());
}

$(function() {
    $("#prevCom").hide();
});
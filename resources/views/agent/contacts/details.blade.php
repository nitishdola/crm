@extends('agent.layout.master')

@section('pageCss')
<style>
.red { color: #f44242 }
.blue { color: #4741f4 }
.yellow { #ebf441 }
.pink { #8c0583 }
.green { #228c04 }
.ucall { text-transform: uppercase;}
.hide{ display: none;}
.Zebra_DatePicker_Icon_Wrapper {
  width: 400px !important;
}
</style>
@stop


@section('main_content')
@include('admin.master.contacts._details')
@stop


@section('pageJs')
<script>
$('#status').change(function() {
  $sts = $(this).val();

  if($sts == 'Apponintment Set') {
    $('#appdate').show(); //console.log($sts);
    $('#appointment_location').show();
    $('#appointment_notes').show();
  }else{
    $('#appdate').hide();
    $('#appointment_location').hide();
    $('#appointment_notes').hide();
  }

  if($sts == 'Sale Made') {
    $('#sale_amount_lbl').show(); //console.log($sts);
  }else{
    $('#sale_amount_lbl').hide();
  }
});

$('#update_status').on('submit', function(e){
  console.log('Test');
  e.preventDefault();
  var status = $('#status').val();
  var appointment_date = $('#appointment_date').val();
  var sale_amount = $('#sale_amount').val();

  if (status == 'Apponintment Set') {
    if(appointment_date.trim() != '') {
      this.submit();
    }else{
      alert('Appointment Date is required !');
    }
  }


  if (status == 'Sale Made') {
    if(sale_amount != '') {
      this.submit();
    }else{
      alert('Sale Amount is required !');
    }
  }

});
</script>
@stop

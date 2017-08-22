 <script>
    function FillBilling(f) {
  if(f.billingtoo.checked == true) {
    f.address1.value = f.address.value;
    f.district1.value = f.district.value;
    f.state1.value = f.state.value;
    f.zip_pin1.value = f.zip_pin.value;
  }
    if(f.billingtoo.checked == false) {
    f.address1.value = '';
    f.district1.value = '';
    f.state1.value = '';
    f.zip_pin1.value = '';
  }
}

  </script>
<script type="text/javascript">
  var checkbox = document.getElementById('checkbox');
  var button = document.getElementById('button');
  var daftar = document.getElementById('daftar');
  var count = 0 ;


  checkbox.onclick = function(){

    count += 1;
    console.log(count);
    if (count == 1 ) {
      // console.log('ada');
      // button.disabled = false;
      daftar.setAttribute("class","btn btn-success active");
    }else if (count == 2) {
      // console.log('ilang');
      checkbox.removeAttribute("checked","");
      count = 0;
        // button.disabled = true;
        daftar.setAttribute("class","btn btn-success disabled");
          // daftar.setAttribute("class","disabled");
    }

  }

  $(document).ready(function(){
      $(".btn-daftar").click(function(){
      $(checkbox).prop('checked',false);
          count = 0;
          daftar.setAttribute("class","btn btn-success disabled");
          $("#persetujuan").modal("show");
      });
  });


// window.onload=applyAttributes;
</script>

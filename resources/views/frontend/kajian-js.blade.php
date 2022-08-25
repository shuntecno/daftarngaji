<script type="text/javascript">

  $(function () {
       $(".identifyingClass").click(function () {
           var my_id_value = $(this).data('id');
           $("#id-kajian").val(my_id_value);
       })
   });


   $(document).ready(function(){
       $(".hapus-kajian").click(function(){
           var kajian_id = $(this).data('id');
           console.log(kajian_id);
             $("#kajian-id").val(kajian_id);
           $("#hapus-kajian").modal("show");

       });
   });


   $(document).ready(function(){
       $(".info").click(function(){
           // var info_kajian = $(this).data('info_kajian');
           // var foto_banner = document.getElementById('foto-banner');
           //
           //
           // var namaFotoBanner = "{{ \URL::to('/storage/foto_banner')}}/" + info_kajian.foto_banner;
           //
           //
           //     foto_banner.setAttribute('src',namaFotoBanner);
           //    $("#deskripsi-kajian").append(info_kajian.deskripsi_kajian);
           //    $("#judul-kajian").append(info_kajian.judul_kajian);
           //    $("#nama-ustadz").append(info_kajian.nama_ustadz);
           //    $("#waktu-kajian").append(info_kajian.waktu_kajian);
           //    $("#batas-jumlah-ikhwan").append(info_kajian.batas_jumlah_ikhwan);
           //    $("#batas-jumlah-akhwat").append(info_kajian.batas_jumlah_akhwat);

           var id = $(this).data('id');

           console.log(id);

            get_info_kajian(id);


       });
   });


   function get_info_kajian(id)
   {
     $.ajax({
         url:"{{route('kajian-info')}}",
         method:'POST',
         data:{
           '_token': '{{csrf_token()}}',
           id:id,  },
         success:function(data){

         console.log(data);
         $('#info-kajian').html(data);
           $("#info").modal("show");

         }
     });
   }





</script>

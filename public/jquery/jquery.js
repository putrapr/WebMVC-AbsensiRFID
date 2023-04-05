$(window).ready(function() {
    $('#rb-tambah').click(function() { 
        // alert('hello form-tambah');       
        $("#form-ubah").hide();
        $("#form-hapus").hide();
        $("#form-tambah").show();
    });
    $('#rb-ubah').click(function() { 
        // alert('hello form-ubah'); 
        $("#form-tambah").hide();          
        $("#form-hapus").hide();
        $("#form-ubah").show();
    });
    $('#rb-hapus').click(function() { 
        // alert('hello form-hapus'); 
        $("#form-tambah").hide();
        $("#form-ubah").hide();
        $("#form-hapus").show();
    });
  });
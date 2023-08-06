$('#addform').submit(function () {

    var form = $('#addform')[0];
    var formData = new FormData(form);
    event.preventDefault();  
 

    request = $.ajax({  
        url: 'handler/insert.php',  
        type: 'post', 
        processData: false,
        contentType: false,
        data: formData
    });

    request.done(function (response, textStatus, jqXHR) {
        console.log(textStatus);
        console.log(jqXHR);
      console.log(response);

        if (response === "Success") {
            alert("Uspesno");
            
            location.reload(true);
        }
        else {
       
            console.log("Greska" + response);
        }
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('Greska: ' + textStatus, errorThrown);
    });
}); 

function obrisi(deleteid){
 
    request = $.ajax({  
        url: 'handler/delete.php',  
        type: 'post', 
        data: {deleteid:deleteid},


        success: function(data, status){
            location.reload(true);
            alert("Uspesno obrisano!");
        }


    });



}

function prikazi(prikazid){
 

    $.post("handler/get.php",{prikazid:prikazid},function(data,status){
 
        var kurs=JSON.parse(data); 
          
        $('#nazivPreview').text("   " + kurs.naziv  );
        $('#descriptionPreview').text("   " +  kurs.opis);
        $('#pricePreview').text("   " +  kurs.cena);
 
        document.getElementById("IMG").src = 'images/'+kurs.slika;


    });

}


function azuriraj(azurirajid){  
    
 
    $.post("handler/get.php",{prikazid:azurirajid},function(data,status){
         
          var kurs=JSON.parse(data);//
                
        console.log(kurs.slika);
        console.log(kurs.id);

          $('#sakrivenoPolje2').val(kurs.slika  );
          $('#sakrivenoPolje').val(kurs.id  );
          $('#naziv2').val(kurs.naziv  );
          $('#opis2').val(kurs.opis);
          $('#cena2').val(kurs.cena);
   
         
  
  
      }); 


}
 
$('#editform').submit(function () {
    var form = $('#editform')[0];
    var formData = new FormData(form);
    event.preventDefault();  
   
 


    request = $.ajax({  
        url: 'handler/update.php',  
        type: 'post', 
        processData: false,
        contentType: false,
        data: formData
    });

    request.done(function (response, textStatus, jqXHR) {
        console.log(response)
        console.log(textStatus) 
        console.log(jqXHR)  
        if (response === "Success") {
            alert("Uspesno azurirano");
            
            location.reload(true);
        }
        else {
           
            console.log(" nije azurirano" + response);
        }
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('Greska: ' + textStatus, errorThrown);
    });
     
    


});

function pretragaPoImenu() {
    const input = document.querySelector('#pretraga');
    const filter = input.value.toUpperCase();
    const table = document.querySelector('#tabela');
    const rows = Array.from(table.querySelectorAll('tr'));
  
    rows.forEach((row) => {
      const columns = Array.from(row.querySelectorAll('td'));
      const matches = columns.some((column) => {
        const text = column.textContent.toUpperCase();
        return text.includes(filter);
      });
  
      if (matches) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
}

function sortiraj() {
 
    var table, rows, switching, i, j, z, k, x, y, shouldSwitch;
    table = document.getElementById("tabela");
 
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            for (j = i + 1; j < rows.length; j++) {
                x = rows[i].getElementsByTagName("TD")[3];
                y = rows[j].getElementsByTagName("TD")[3];
                z = parseInt(x.innerHTML);
                k = parseInt(y.innerHTML);
                if (z > k) {
                    rows[i].parentNode.insertBefore(rows[j], rows[i]);
                }
            }
        }

   


 


}

 





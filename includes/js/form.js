
const symptoms = ["bleeding", "sore throat", "fatigue" ,
"rash" ,"diarrhea" ,"swelling" , "stiffening ear" ,"difficulty chewing" ,"aches" ,"coughing" ,"swelling" ,"stiffening ear" ,"difficulty chewing" ,"burrows" ,"Lesions" ,"nausea" ,"sore throat"];

 $( document ).ready(function() {
  let sForm = $('.symptoms-form');
  symptoms.forEach(function(element) {
    sForm.append(
      `  <div class="custom-control custom-checkbox">
    <input type="checkbox" name="chk_group[]" value="${element}" class="custom-control custom-checkbox" id="exampleCheck1">
    <label class="custom-control-label" for="exampleCheck1">${element}</label>
  </div>`
      );
  });
});



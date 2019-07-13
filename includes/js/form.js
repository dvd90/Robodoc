const symptoms = ["bleeding", "sore throat", "fatigue" ,
"rash" ,"diarrhea" ,"swelling" , "stiffening ear" ,"difficulty chewing" ,"aches" ,"coughing" ,"swelling" ,"stiffening ear" ,"difficulty chewing" ,"burrows" ,"Lesions" ,"nausea" ,"sore throat"];

 $( document ).ready(function() {
  let sForm = $('.symptoms-form');
  symptoms.forEach(function(element) {
    sForm.append(
      `  <div class="form-group form-check">
    <input type="checkbox" name="chk_group[]" value="${element}" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">${element}</label>
  </div>`
      );
  });
});

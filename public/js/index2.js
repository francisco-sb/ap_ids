var isEditing = false,
    tempNameValue = "",
    tempDataValue = "",
    tempSiValue = "",
    tempNoValue = "",
    tempObserValue = "";
    

// Handles live/dynamic element events, i.e. for newly created edit buttons
$(document).on('click', '.edit', function() {
   var parentRow = $(this).closest('tr'),
       tableBody = parentRow.closest('tbody'),
       tdName = parentRow.children('td.name'),
       tdData = parentRow.children('td.data'),
       tdSi = parentRow.children('td.si'),
       tdNo = parentRow.children('td.no'),
       tdObser = parentRow.children('td.obser');
       

   
   if(isEditing) {  
      var nameInput = tableBody.find('input[name="name"]'),
          dataInput = tableBody.find('input[name="data"]'),
          siInput = tableBody.find('input[name="si"]'),
          noInput = tableBody.find('input[name="no"]'),
          obserInput = tableBody.find('input[name="obser"]'),
          tdNameInput = nameInput.closest('td'),
          tdDataInput = dataInput.closest('td'),
          tdSiInput = siInput.closest('td'),
          tdNoInput = noInput.closest('td'),
          tdObserInput = obserInput.closest('td'),
          currentEdit = tdNameInput.parent().find('td.edit');
      
      if($(this).is(currentEdit)) {
         // Save new values as static html
         var tdNameValue = nameInput.prop('value'),
             tdDataValue = dataInput.prop('value'),
             tdSiValue = siInput.prop('value'),
             tdNoValue = noInput.prop('value'),
             tdObserValue = obserInput.prop('value');

         
         tdNameInput.empty();
         tdDataInput.empty();
         tdSiInput.empty();
         tdNoInput.empty();
         tdObserInput.empty();
         
         tdNameInput.html(tdNameValue);
         tdDataInput.html(tdDataValue);
         tdSiInput.html(tdSiValue);
         tdNoInput.html(tdNoValue);
         tdObserInput.html(tdObserValue);

      }
      else {
         // Restore previous html values
         tdNameInput.empty();
         tdDataInput.empty();
         tdSiInput.empty();
         tdNoInput.empty();
         tdObserInput.empty();
         
         tdNameInput.html(tempNameValue);
         tdDataInput.html(tempDataValue);
         tdSiInput.html(tempSiValue);
         tdNoInput.html(tempNoValue);
         tdObserInput.html(tempObserValue);

      }
      // Display static row
      currentEdit.html('Edit');
      isEditing = false;
   }
   else {
      // Display editable input row
      isEditing = true;      
      $(this).html('Save');
      
      var tdNameValue = tdName.html(),
          tdDataValue = tdData.html(),
          tdSiValue = tdSi.html(),
          tdNoValue = tdNo.html(),
          tdObserValue = tdObser.html();
      
      // Save current html values for canceling an edit
      tempNameValue = tdNameValue;
      tempDataValue = tdDataValue;
      tempSiValue = tdSiValue;
      tempNoValue = tdNoValue;
      tempObserValue = tdObserValue;
      
      // Remove existing html values
      tdName.empty();
      tdData.empty();
      tdSi.empty();
      tdNo.empty();
      tdObser.empty();
      
      // Create input forms
      tdName.html('<input type="text" name="name" value="' + tdNameValue + '">');
      tdData.html('<input type="text" name="data" value="' + tdDataValue + '">');
      tdSi.html('<input type="text" name="si" value="' + tdSiValue + '">');
      tdNo.html('<input type="text" name="no" value="' + tdNoValue + '">');
      tdObser.html('<input type="text" name="obser" value="' + tdObserValue + '">');

   }
});

// Handles live/dynamic element events, i.e. for newly created trash buttons
$(document).on('click', '.trash', function() {
   // Turn off editing if row is current input
   if(isEditing) {
      var parentRow = $(this).closest('tr'),
          tableBody = parentRow.closest('tbody'),
          tdInput = tableBody.find('input').closest('td'),
          currentEdit = tdInput.parent().find('td.edit'),
          thisEdit = parentRow.find('td.edit');
      
      if(thisEdit.is(thisEdit)) {
         isEditing = false;
      }
   }   
   
   // Remove selected row from table
   $(this).closest('tr').remove();
});

$('.new-row').on('click', function() {
   var tableBody = $(this).closest('tbody'),       
       trNew = '<tr><td class="name"><input type="text" name="name" value=""></td><td class="data"><input type="text" name="data" value=""></td><td class="si"><input type="text" name="si" value=""></td><td class="no"><input type="text" name="no" value=""></td><td class="obser"><input type="text" name="obser" value=""></td><td class="edit">Save</td><td class="trash">delete</td></tr>';

   if(isEditing) {
      var nameInput = tableBody.find('input[name="name"]'),
          dataInput = tableBody.find('input[name="data"]'),
          siInput = tableBody.find('input[name="si"]'),
          noInput = tableBody.find('input[name="no"]'),
          obserInput = tableBody.find('input[name="obser"]'),
          tdNameInput = nameInput.closest('td'),
          tdDataInput = dataInput.closest('td'),
          tdSiInput = siInput.closest('td'),
          tdNoInput = noInput.closest('td'),
          tdObserInput = obserInput.closest('td'),
          currentEdit = tdNameInput.parent().find('td.edit');
      
      // Get current input values for newly created input cases
      var newNameInput = nameInput.prop('value'),
          newDataInput = dataInput.prop('value'),
          newSiInput = siInput.prop('value'),
          newNoInput = noInput.prop('value'),
          newObserInput = obserInput.prop('value');
      
      // Restore previous html values
      tdNameInput.empty();
      tdDataInput.empty();
      tdSiInput.empty();
      tdNoInput.empty();
      tdObserInput.empty();

      tdNameInput.html(newNameInput);
      tdDataInput.html(newDataInput);
      tdSiInput.html(newSiInput);
      tdNoInput.html(newNoInput);
      tdObserInput.html(newObserInput);
      
      // Display static row
      currentEdit.html('Edit');
   }
   
   isEditing = true;   
   tableBody.find('tr:last').before(trNew);


});

var loading = function(e) {
  e.preventDefault();
  e.stopPropagation();
  e.target.classList.add('loading');
  e.target.setAttribute('disabled','disabled');
  setTimeout(function(){
    e.target.classList.remove('loading');
    e.target.removeAttribute('disabled');
  },1500);
};

var btns = document.querySelectorAll('button');
for (var i=btns.length-1;i>=0;i--) {
  btns[i].addEventListener('click',loading);
}


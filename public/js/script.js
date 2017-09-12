var isEditing = false,
    tempNameValue = "",    
    tempDataValue = "",
    tempPondeValue = "";

// Handles live/dynamic element events, i.e. for newly created edit buttons
$(document).on('click', '.edit', function() {
   var parentRow = $(this).closest('tr'),
       tableBody = parentRow.closest('tbody'),
       tdName = parentRow.children('td.name'),
       tdPonde = parentRow.children('td.ponde'),
       tdData = parentRow.children('td.data');
   
   if(isEditing) {  
      var nameInput = tableBody.find('input[name="name"] '),
          dataInput = tableBody.find('input[name="data"]'),
          pondeInput = tableBody.find('input[name="ponde"]'),
          tdNameInput = nameInput.closest('td'),
          tdPondeInput = pondeInput.closest('td'),
          tdDataInput = dataInput.closest('td'),
          currentEdit = tdNameInput.parent().find('td.edit');
          
      
      if($(this).is(currentEdit)) {
         // Save new values as static html
         var tdNameValue = nameInput.prop('value'),            
             tdDataValue = dataInput.prop('value'),
             tdPondeValue = pondeInput.prop('value');
         
         tdNameInput.empty();
         tdDataInput.empty();
         tdPondeInput.empty();
         
         tdNameInput.html(tdNameValue);
         tdDataInput.html(tdDataValue);
         tdPondeInput.html(tdPondeValue);
      }
      else {
         // Restore previous html values
         tdNameInput.empty();
         tdDataInput.empty();
         tdPondeInput.empty();
         
         tdNameInput.html(tempNameValue);
         tdDataInput.html(tempDataValue);
         tdPondeInput.html(tempPondeValue);
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
          tdPondeValue = tdPonde.html(),
          tdDataValue = tdData.html();
      
      // Save current html values for canceling an edit
      tempNameValue = tdNameValue;
      tempDataValue = tdDataValue;
      tempPondeValue = tdPondeValue;
      
      // Remove existing html values
      tdName.empty();
      tdData.empty();
      tdPonde.empty();
      
      // Create input forms
      tdName.html('<input type="text" name="name" value=" ' + tdNameValue + '">');
      tdData.html('<input type="text" name="data" value="' + tdDataValue + '">');
      tdPonde.html('<input type="text" name="ponde" value="' + tdPondeValue + '">');
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
       trNew = '<tr><td class="name"><input type="text" name="name" value=""></td><td class="data"><input type="text" name="data" value=""></td><td class="ponde"><input type="text" name="ponde" value=""></td><td class="edit">Save</td><td class="trash">delete</td></tr>';

   if(isEditing) {
      var nameInput = tableBody.find('input[name="name"]'),
          dataInput = tableBody.find('input[name="data"]'),
          pondeInput = tableBody.find('input[name="ponde"]'),
          tdNameInput = nameInput.closest('td'),
          tdDataInput = dataInput.closest('td'),
          tdPondeInput = pondeInput.closest('td'),
          currentEdit = tdNameInput.parent().find('td.edit');
      
      // Get current input values for newly created input cases
      var newNameInput = nameInput.prop('value'),
          newPondeInput = namePonde.prop('value'),
          newDataInput = dataInput.prop('value');
      
      // Restore previous html values
      tdNameInput.empty();
      tdPondeInput.empty();
      tdDataInput.empty();

      tdNameInput.html(newNameInput);
      tdNamePonde.html(newNameInput);
      tdDataInput.html(newDataInput);
      
      // Display static row
      currentEdit.html('Edit');
   }
   
   isEditing = true;   
   tableBody.find('tr:last').before(trNew);
}



);
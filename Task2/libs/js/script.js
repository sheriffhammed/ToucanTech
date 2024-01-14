$('#search').click(function() {
	const searchName = $('#searchName').val()
        
	if(!searchName){
		alert('Please Enter Name to Search')
		
		return false;
	}
	else{
		$.ajax({
			url: "libs/php/searchName.php",
			type: 'GET',
			dataType: 'json',
			data: {
				searchName,
			},
			success: function(result){
				//console.log(JSON.stringify(result));
				const tableHeader =`<tr>
				<th scope="col">FirstName</th>
					<th scope="col">SurName</th>
					<th scope="col">Email Address</th>
					
					</tr>`;	
				let tableData = '';
				for(let i in result.data){
					tableData += `<tr>
					<td>${result.data[i].FirstName}</td>
					<td>${result.data[i].SurName}</td>
					<td>${result.data[i].EmailAddress}</td>				
					</tr>`;			
					}
				
				$('.tableHeader').html(tableHeader);
				$('.tableData').html(tableData);

			},
			error: function(error) {
				console.log(error.responseText)
			
			}
			
		}); 
	}

});


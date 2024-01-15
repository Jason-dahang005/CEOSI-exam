$(document).ready(function(){
    storeData()
    fetchData()
})

// adding new products
function storeData() {
    $('#formData').submit(function(e){
        e.preventDefault()

        var form = $(this).serialize()
    
        $.ajax({
            type: 'POST',
            url: '/api/store-products',
            data: form,
            success: function(response) {
                $('#formData')[0].reset()
                window.location.href = '/'
                fetchData()
                console.log(response)
            },
            error: function(error){
                console.log(error)
            }
        })
    })
}

// fetching products
function fetchData(){
    $.ajax({
        type: 'GET',
        url: '/api/get-products',
        success: function(response){
            const tableBody = $('#data-table tbody')
            tableBody.empty()
            $.each(response.data, function(index, item){
                
                const productID = item.id

                tableBody.append('<tr><td>' + item.product_name +'</td><td><a href="/update-product/">Update</a> <a href="/delete-products/">Delete</a></td></tr>')
            })
        },
        error: function(error){
            console.log(error)
        }
    })
}

function updateProduct(prodID){
    $('#updateFormData').submit(function(e){
        e.preventDefault()

        var updatedForm = $(this).serialize()

        $.ajax({
            type: 'PUT',
            url: '/api/update-products/' + prodID,
            data: updatedForm,
            success: function(response){
                fetchData()
                console.log(response)
                console.log('Product updated')
            },
            error: function(error){
                console.log(error)
            }
        })
    })
}
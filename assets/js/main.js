jQuery(document).ready(function ($) {
    $('.category_list').on('click', function () {

         // Remove the 'active' class from all li elements
         $('.category_list').removeClass('text-blue-400');

         // Add the 'active' class to the clicked li
         $(this).addClass('text-blue-400');

        const category_slug = $(this).data('slug');
        // console.log('Sending slug:', category_slug);

        
        $.ajax({
            url: product_cate_filter.ajaxurl,
            type: 'POST',
            data: {
                action: 'filter_category',
                category: category_slug,
            },
            success: function (response) {
                if (response.success) {
                    $('#results').html(response.data);
                } else {
                    console.log('Error:', response.data);
                    $('#results').html('<p>' + response.data + '</p>');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('AJAX request failed:', textStatus, errorThrown); // Log detailed error
                console.log('Response:', jqXHR.responseText); // Log the raw response text from server
                $('#results').html('<p>An error occurred. Please try again later.</p>');
            }
        });
    });
});

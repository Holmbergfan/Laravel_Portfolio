<script>
  $(document).ready(function() {
    // "Add Category" form
    $('#addCategoryForm').submit(function(e) {
      e.preventDefault();
      var categoryName = $('#newCategoryName').val();
      if (categoryName) {
        $.ajax({
          url: '{{ route('admin.categories.store') }}',
          type: 'POST',
          data: {
            name: categoryName,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $('#category').append($('<option>', {
              value: response.name,
              text: response.name
            }));
            $('#addCategoryModal').modal('hide');
            $('#newCategoryName').val('');
          }
        });
      }
    });

    // "Add Badge" form
    $('#addBadgeForm').submit(function(e) {
      e.preventDefault();
      var badgeName = $('#newBadgeName').val();
      var badgeGroup = $('#newBadgeGroup').val();
      if (badgeName && badgeGroup) {
        $.ajax({
          url: '{{ route('admin.badges.store') }}',
          type: 'POST',
          data: {
            name: badgeName,
            group: badgeGroup,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            // Possibly you want to dynamically insert
            // a new form-check item in the corresponding badge group
            $('#addBadgeModal').modal('hide');
            $('#newBadgeName').val('');
            $('#newBadgeGroup').val('');
          }
        });
      }
    });
  });
</script>
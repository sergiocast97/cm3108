$(document).ready(function() {
    $('#bigtable').DataTable( {
        retrieve: true,
        select: true,
        order: [1, 'asc'],
        pageLength: 25,
    });
})
function confirmDelete(url) {
    if (confirm("Are you sure you want to delete this?")) {
        location.href = url;
    } else {
        false;
    }       
}
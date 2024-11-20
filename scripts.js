document.querySelector('.navbar-toggler').addEventListener('click', function() {
    document.querySelector('.navbar-collapse').classList.toggle('show');
});
// Chức năng Modal
document.getElementById('modalButton').onclick = function() {
    document.getElementById('myModal').style.display = 'block';
}

document.querySelector('.close').onclick = function() {
    document.getElementById('myModal').style.display = 'none';
}

window.onclick = function(event) {
    if (event.target == document.getElementById('myModal')) {
        document.getElementById('myModal').style.display = 'none';
    }
}
document.addEventListener("DOMContentLoaded", function() {
    const maxLength = 20; // Giới hạn số ký tự

    const titles = document.querySelectorAll('.card-title');
    titles.forEach(title => {
        if (title.textContent.length > maxLength) {
            title.setAttribute('data-full-title', title.textContent); // Lưu toàn bộ tiêu đề vào thuộc tính data
            title.textContent = title.textContent.slice(0, maxLength) + '...';
        }
    });
});


$(document).ready(function () {
    if ($('.blog-main').length) {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/?page=post&action=last",
            success: function (result) {
                result.forEach(function (item) {
                    $('.blog-main').append(
                        `
                        <div class="blog-post">
                            <h2 class="blog-post-title">` + item.title + `</h2>
                            <p class="blog-post-meta">` + item.updated_at + `</p>
                            ` + item.text + `
                        </div>
                    `);
                });
            }
        });
    }
});
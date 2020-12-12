$(document).ready(() => {
  getAllPosts();
});

const getAllPosts = async () => {
  try {
    const { data } = await axios("api/getAllPosts.php");

    const { errors = false, message = "", data: results = [] } = data || {};

    if (errors) {
      alert(message);
      return;
    }

    results.forEach((post) => {
      const { id, image, title, text, created } = post;
      const html = `
            <div class="card mb-4 col-md-4">
            <img class="card-img-top" src="api/uploads/${image}">
            <div class="card-body">
            <h2 class="card-title">${title}</h2>
            <a href="post.php?id=${id}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
            ${created}
            </div>
        </div>        
        `;

      $("#posts").append(html);
    });
  } catch (error) {
    alert("Something went wrong!");
  }
};

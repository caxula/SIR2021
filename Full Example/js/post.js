$(document).ready(() => {
  const id = new URL(document.URL).searchParams.get("id");
  if (!id) location.href = "index.php";

  getPostById(id);

  $("#form").on("submit", sendComment);
  $("#delete").on("click", () => {
    if (confirm("Do you want delete this post?")) deletePost();
  });
  $("#update").on("click", () => {
    if (confirm("Do you want update this post?")) updatePost();
  });
});

const getPostById = async (id) => {
  try {
    const { data } = await axios(`api/getPostById.php?id=${id}`);

    const { errors = false, message = "", data: results = [] } = data || {};

    if (errors) {
      alert(message);
      return;
    }

    const post = results.length ? results[0] : null;

    if (!post) {
      location.href = "index.php";
      return;
    }

    const { title, text, image, created } = post;

    $("#title").text(title);
    $("#text").text(text);
    $("#date").text(created);
    $("#image").attr("src", `api/uploads/${image}`);

    getCommentsByPost();
  } catch (error) {
    alert("Something went wrong");
  }
};

const sendComment = async (event) => {
  try {
    event.preventDefault();
    const id = new URL(document.URL).searchParams.get("id");
    const name = $("#name").val() || null;
    const text = $("#comment").val() || null;

    if (!text || !name || !id) {
      alert("Missing fields!");
      return;
    }

    const config = {
      method: "POST",
      url: "api/addComment.php",
      params: {
        name,
        text,
        id,
      },
    };

    const { data } = await axios(config);

    const { errors = false, message = "", id: lastId } = data || {};

    if (errors) {
      alert(message);
      return;
    }

    getCommentsByPost();

    setTimeout(() => {
      $("#form")[0].reset();
    }, 1000);
  } catch (error) {
    alert("Something went wrong");
  }
};

const getCommentsByPost = async () => {
  try {
    const id = new URL(document.URL).searchParams.get("id");
    const { data } = await axios(`api/getCommentsByPost.php?id=${id}`);

    const { errors = false, message = "", data: results = [] } = data || {};

    if (errors) {
      alert(message);
      return;
    }

    let html = "";
    results.forEach((post) => {
      const { id, name, text } = post;
      html += `
          <div id="${id}" class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
              <h5 class="mt-0">${name}</h5>
              ${text}
          </div>
          </div>       
          `;
    });
    $("#comments").html(html);
  } catch (error) {
    alert("Something went wrong");
  }
};

const deletePost = async () => {
  try {
    const id = new URL(document.URL).searchParams.get("id");

    if (!id) {
      alert("Missing fields!");
      return;
    }

    const config = {
      method: "DELETE",
      url: "api/deletePost.php",
      params: {
        id,
      },
    };

    const { data } = await axios(config);

    const { errors = false, message = "" } = data || {};

    if (errors) {
      alert(message);
      return;
    }

    setTimeout(() => {
      location.href = "index.php";
    }, 1000);
  } catch (error) {
    alert("Something went wrong");
  }
};

const updatePost = async () => {
  try {
    const title = $("#title").text() || null;
    const text = $("#text").text() || null;
    const id = new URL(document.URL).searchParams.get("id");

    if (!title || !text || !id) {
      alert("Missing fields!");
      return;
    }

    const config = {
      method: "PUT",
      url: "api/updatePost.php",
      params: {
        title,
        text,
        id,
      },
    };

    const { data } = await axios(config);

    const { errors = false, message = "" } = data || {};

    if (errors) {
      alert(message);
      return;
    }

    getPostById(id);
  } catch (error) {
    alert("Something went wrong");
  }
};

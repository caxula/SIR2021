$(document).ready(() => {
  $("#form").on("submit", submitForm);
});

const submitForm = async (event) => {
  try {
    event.preventDefault();

    const title = $("#title").val() || null;
    const text = $("#text").val() || null;
    const image = $("#image")[0].files[0] || null;

    if (!title || !text || !image) {
      alert("Missing fields");
      return;
    }

    var bodyFormData = new FormData();
    bodyFormData.append("title", title);
    bodyFormData.append("text", text);
    bodyFormData.append("image", image);

    const config = {
      method: "POST",
      url: "api/insertPost.php",
      headers: { "Content-Type": "multipart/form-data" },
      data: bodyFormData,
    };

    const { data } = await axios(config);
    const { errors = false, message = "" } = data || {};

    if (errors) {
      alert(message);
      return;
    }

    location.href = "index.php";
  } catch (error) {
    alert("Something went wrong!");
  }
};

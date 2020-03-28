function getFriendsURL () {
    var discusspage = "https://connect.brisebox.com/invite"; // https://connect.brisebox.com/ or http://127.0.0.1:8000/
    var bb_invite_url_details = window.location.search;
    var friends_url = discusspage + bb_invite_url_details;

    window.location.href = friends_url;

    return window.location.href;
}

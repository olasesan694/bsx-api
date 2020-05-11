function getFriendsURL () {
    var discusspage = "http://connect.brisebox.com/invite"; 
    var bb_invite_url_details = window.location.search;
    var friends_url = discusspage + bb_invite_url_details;

    window.location.href = friends_url;

    return window.location.href;
}

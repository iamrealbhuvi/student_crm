let feedspot = document.getElementById('feedspot');

let feedarray = [...feed_array];




let map_out = feedarray.map((val, index) => {
    return (`
    
    <div class="feed-container d-flex">
    <div class="feed-border clearfix ">
        
        <div class="feed-body clearfix">
            <div class="feed-avatar">
                <img width="50px" height="50px" src="../../photostore/institution-profiles/${instit}/${instit_pic}" alt="" />
            </div>
            <div class="feed-content">
                <div class="username text-primary" style="cursor: pointer;">${val['postername']}</div>
                <p>${val['postcontent']}
                
                </p>
            </div>

        </div>
        <div class="feed-footer clearfix">
            <div class="footer-left">
                <span class="footer-time">${val['postdate']}&nbsp;${val['posttime']}</span>
            </div>
            <div class="footer-right">
                <!--span class="plusOne"><a href="#" title="Like"><i class="fa fa-heart"></i>${val['upvotes']}</a></span-->
            </div>
        </div>
    </div>
    <div class="btn-group dropend overflow-visible">
    <button type="button" class="d-flex justify-content-center align-items-center opt-btn btn  bg-light rounded-0" data-bs-toggle="dropdown" aria-expanded="false">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
  </svg>
    </button>
    <ul class="dropdown-menu">
        <li><form action="" method="POST"><button id="edit-btn-config" class="del-btn w-100 btn rounded-0" type="submit" name="editbtn" value="${val['id']}" >Edit Post</button></form></li>
        <li><form action="" method="POST"><button id="del-btn-config" class="del-btn w-100 btn rounded-0" type="submit" name="deletebtn" value="${val['id']}">Delete Post</button></form></li>
    </ul>
    </div>
    </div>


`);
});


for (let a = 0; a < map_out.length; a++) {
    feedspot.innerHTML += map_out[a];
}


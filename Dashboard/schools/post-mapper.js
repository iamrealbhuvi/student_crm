let feedspot = document.getElementById('feedspot');

let feedarray = [...feed_array];





let map_out = feedarray.map((val,index) => {
    return (`<div class="feed-container ">
    <div class="feed-border clearfix ">
        
        <div class="feed-body clearfix">
            <div class="feed-avatar">
                <img width="50px" height="50px" src="../../photostore/institution-profiles/${instit}/${instit_pic}" alt="" />
            </div>
            <div class="feed-content">
                <div class="username text-primary">${schoolName}</div>
                <p>${val['postcontent']}
                
                </p>
            </div>
        </div>
        <div class="feed-footer clearfix">
            <div class="footer-left">
                <span class="footer-time">${val['postdate']}&nbsp;${val['posttime']}</span>
            </div>
            <div class="footer-right">
                <span class="plusOne"><a href="#" title="Like"><i class="fa fa-heart"></i>${val['upvotes']}</a></span>
            </div>
        </div>
    </div>
</div>
`);
});


for (let a = 0; a<map_out.length; a++){
    feedspot.innerHTML += map_out[a];
}


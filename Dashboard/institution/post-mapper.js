
let feedspot = document.getElementById('feedspot');

let feedarray = [...feed_array];




let map_out = feedarray.map((val, index) => {
    return (`
    
                                
                            
    <div class="w-75 m-3 rounded-3 bg-gray-100 p-3 d-block">
    <div class=" dropdown float-lg-end pe-4">
                                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-secondary"></i>
                                    </a>
                                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                        <li><form action="" method="POST"><button class="dropdown-item border-radius-md" type="submit" id="edit-btn-config" name="editbtn" value="${val['id']}">Edit Post</button></form></li>
                                        <li><form action="" method="POST"><button class="dropdown-item border-radius-md" type="submit" id="del-btn-config" name="deletebtn" value="${val['id']}">Delete Post</button></form></li>
                                        
                                    </ul>
                                </div>
        <div class=" mx-2 my-2 fs-5" style="font-weight: 500;">
            ${val['postcontent']}
        </div>
        <br>
        <div class="mb-3">
            <div class="float-end">${val['postdate']}&nbsp;&nbsp;${val['posttime']}</div>
        </div>

    </div>

`);
});


for (let a = 0; a < map_out.length; a++) {
    feedspot.innerHTML += map_out[a];
}


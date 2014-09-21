<div id="recent-work" class="recent">
	 	<h1>Recent</h1>
    <div id="wall" class="wall"></div>
    <p class="fb-link"><a>Visit my Facebook page</a></p>
    
    <!-- jQuery templates. Not rendered by the browser. Notice the type attributes -->
    <script id="headingTpl" type="text/x-jquery-tmpl"></script>
    
    <script id="feedTpl" type="text/x-jquery-tmpl">
    <li class="post">
        <div class="status">
            <div class="fb-header">
            <img src="${from.picture}" class="avatar" />
            <h2><a href="http://www.facebook.com/profile.php?id=${from.id}" target="_blank">${from.name} on Facebook</a></h2>
            </div>
            
            <p class="message">{{html message}}</p>
            {{if type == "link" }}
                <div class="attachment">
                    {{if picture}}
                        <img class="picture" src="${picture}" />
                    {{/if}}
                    <div class="attachment-data">
                        <p class="name"><a href="${link}" target="_blank">${name}</a></p>
                        <p class="caption">${caption}</p>
                        <p class="description">${description}</p>
                    </div>
                </div>
            {{/if}}
        </div>
        
        <p class="meta">${created_time} · 
        {{if comments}}
            ${comments.count} Comment{{if comments.count>1}}s{{/if}}
        {{else}}
            0 Comments
        {{/if}} · 
        {{if likes}}
            ${likes.count} Like{{if likes.count>1}}s{{/if}}
        {{else}}
            0 Likes
        {{/if}}
        </p>
    </li>
    </script>

</div>
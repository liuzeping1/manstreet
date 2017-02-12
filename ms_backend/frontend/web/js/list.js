  /* 点赞功能 */
  $('.favorite_done').click(function(){
    artId = $(this).attr('artId');
    url = '?r=index/click';
    count = $('.count');
    _this = $(this);
    num = $('.count').html();
    $.get(url,{id:artId},function(msg){
      // console.log(msg);
      // return;
      if(msg==1)
      {
        count.html(num*1+1*1);
        _this.css({"background":"gray"});
      }
      else if( msg == 2)
      {
        alert('呀！已经点过赞了');
      }
      else
      {
        alert('点赞失败');
      }
    }) 
  })


  /* 评论功能 */
  $('.btn').click(function(){
    artId = $(this).attr('artId');
    obj = $('#content');
    content = $('#content').val();
    if(content=='')
    {
      alert('啥也不写评论鸡毛呢  亲!');
      return;
    }
    url = '?r=index/comment';
    $.get(url,{id:artId,content:content},function(msg){
      if(msg)
      {
        obj.val('');
        alert('评论成功啦!');
        location.reload();
      }
      else
      {
        alert('评论失败啦!');
      }
    })
  })

  /* 回复功能开发 */
  $('.dd').click(function(){
    alert(' 回复功能有待开发  ... ');
  })
首页  电影介绍，点击订票后（登录后，否则跳转登陆）
      列出改电影院 播放时间


#编号	电影名字	播放时间	已售票数	剩余票数	操作
SELECT  booking_playtime.playid, booking_film.filmname,booking_playtime.time,
  count(booking_ticket.ticketid),40-count(booking_ticket.ticketid)
      FROM booking_ticket,booking_playtime,booking_film
WHERE booking_film.filmid=booking_playtime.filmid AND
      booking_playtime.playid=booking_ticket.playid AND
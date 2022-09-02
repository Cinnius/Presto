const one_Sec  = 1000
  ,   one_Min  = one_Sec * 60
  ,   one_Hour = one_Min * 60 
  ,   one_Day  = one_Hour * 24
  ,  countDown = new Date('Sep 07, 2022 23:59:59').getTime()
  ,  X_count   = { days    : document.getElementById('countdown1')
                 , hours   : document.getElementById('countdown2')
                 , minutes : document.getElementById('countdown3')
                 , seconds : document.getElementById('countdown4')
                 }
  ;
setInterval(_=>
  {
  let now = new Date().getTime()
    , tim = countDown - now
    ;
  X_count.days.textContent    = Math.floor(tim / one_Day) 
  X_count.hours.textContent   = Math.floor((tim % one_Day ) / one_Hour )
  X_count.minutes.textContent = Math.floor((tim % one_Hour) / one_Min  )
  X_count.seconds.textContent = Math.floor((tim % one_Min ) / one_Sec  )
  }
  , 1000);
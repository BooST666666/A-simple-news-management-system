// 轮播图js
var swiper = new Swiper(".bg-slider-thumbs", {
    loop: true,
    spaceBetween: 0,
    slidesPerView: 0,
    
  });
  var swiper2 = new Swiper(".bg-slider", {
    loop: true,
    spaceBetween: 0,

    thumbs: {
      swiper: swiper,
    },
  });

  // 当往下滑动时候，导航栏出现模糊框
  window.addEventListener("scroll",function(){
    const header = document.querySelector("header")
    header.classList.toggle("sticky",this.window.scrollY > 0);
  });
  // 手机菜单栏
  const menuBtn = document.querySelector(".nav-menu-btn")
  const closeBtn = document.querySelector(".nav-close-btn")
  const navigation = document.querySelector(".navigation")

  menuBtn.addEventListener("click",()=>{
    navigation.classList.add("active")
  });
  closeBtn.addEventListener("click",()=>{
    navigation.classList.remove("active")
  });
  
  
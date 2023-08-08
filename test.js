
//Le script pour ouvrir et fermer la modale

function openModal() {
    document.getElementById("myModal").style.display = "block";
  }
  
  function closeModal() {
    document.getElementById("myModal").style.display = "none";
  }
  
  function openSecondModal() {
    document.getElementById("mySecondModal").style.display = "block";
  }
  
  function closeSecondModal() {
    document.getElementById("mySecondModal").style.display = "none";
  }

  function openThirdModal() {
    document.getElementById("myThirdModal").style.display = "block";
  }
  
  function closeThirdModal() {
    document.getElementById("myThirdModal").style.display = "none";
  }

  function openFourthModal() {
    document.getElementById("myFourthModal").style.display = "block";
  }
  
  function closeFourthModal() {
    document.getElementById("myFourthModal").style.display = "none";
  }

  function openFifthModal() {
    document.getElementById("myFifthModal").style.display = "block";
  }
  
  function closeFifthModal() {
    document.getElementById("myFifthModal").style.display = "none";
  }
  
  function openSixthModal() {
    document.getElementById("mySixthModal").style.display = "block";
  }
  
  function closeSixthModal() {
    document.getElementById("mySixthModal").style.display = "none";
  }

  function openSeventhModal() {
    document.getElementById("mySeventhModal").style.display = "block";
  }
  
  function closeSeventhModal() {
    document.getElementById("mySeventhModal").style.display = "none";
  }

  function openEighthModal() {
    document.getElementById("myEighthModal").style.display = "block";
  }
  
  function closeEighthModal() {
    document.getElementById("myEighthModal").style.display = "none";
  }

  function openNinthModal() {
    document.getElementById("myNinthModal").style.display = "block";
  }
  
  function closeNinthModal() {
    document.getElementById("myNinthModal").style.display = "none";
  }

  function openTenthModal() {
    document.getElementById("myTenthModal").style.display = "block";
  }
  
  function closeTenthModal() {
    document.getElementById("myTenthModal").style.display = "none";
  }

  function openEleventhModal() {
    document.getElementById("myEleventhModal").style.display = "block";
  }
  
  function closeEleventhModal() {
    document.getElementById("myEleventhModal").style.display = "none";
  }

  function openTwelfthModal() {
    document.getElementById("myTwelfthModal").style.display = "block";
  }
  
  function closeTwelfthModal() {
    document.getElementById("myTwelfthModal").style.display = "none";
  }

  function openThirteenthModal() {
    document.getElementById("myThirteenthModal").style.display = "block";
  }
  
  function closeThirteenthModal() {
    document.getElementById("myThirteenthModal").style.display = "none";
  }

  function openFourteenthModal() {
    document.getElementById("myFourteenthModal").style.display = "block";
  }
  
  function closeFourteenthModal() {
    document.getElementById("myFourteenthModal").style.display = "none";
  }

  function openFifteenthModal() {
    document.getElementById("myFifteenthModal").style.display = "block";
  }
  
  function closeFifteenthModal() {
    document.getElementById("myFifteenthModal").style.display = "none";
  }
  

  function openSixteenthModal() {
    document.getElementById("mySixteenthModal").style.display = "block";
  }
  
  function closeSixteenthModal() {
    document.getElementById("mySixteenthModal").style.display = "none";
  }

  function openSeventeenthModal() {
    document.getElementById("mySeventeenthModal").style.display = "block";
  }
  
  function closeSeventeenthModal() {
    document.getElementById("mySeventeenthModal").style.display = "none";
  }

  function openEighteenthModal() {
    document.getElementById("myEighteenthModal").style.display = "block";
  }
  
  function closeEighteenthModal() {
    document.getElementById("myEighteenthModal").style.display = "none";
  }


  function openNineteenthModal() {
    document.getElementById("myNineteenthModal").style.display = "block";
  }
  
  function closeNineteenthModal() {
    document.getElementById("myNineteenthModal").style.display = "none";
  }


  function openTwentiethModal() {
    document.getElementById("myTwentiethModal").style.display = "block";
  }
  
  function closeTwentiethModal() {
    document.getElementById("myTwentiethModal").style.display = "none";
  }

  function openTwentyFirstModal() {
    document.getElementById("myTwentyFirstModal").style.display = "block";
  }
  
  function closeTwentyFirstModal() {
    document.getElementById("myTwentyFirstModal").style.display = "none";
  }

  function openTwentySecondModal() {
    document.getElementById("myTwentySecondModal").style.display = "block";
  }
  
  function closeTwentySecondModal() {
    document.getElementById("myTwentySecondModal").style.display = "none";
  }

  function openTwentyThirdModal() {
    document.getElementById("myTwentyThirdModal").style.display = "block";
  }
  
  function closeTwentyThirdModal() {
    document.getElementById("myTwentyThirdModal").style.display = "none";
  }

  function openTwentyFourthModal() {
    document.getElementById("myTwentyFourthModal").style.display = "block";
  }
  
  function closeTwentyFourthModal() {
    document.getElementById("myTwentyFourthModal").style.display = "none";
  }





  //Carousel défilement images dans les modales.
  window.onload = function () {

   let sections = [
      {
        id: 'carousel',
        images: ['/photos-vehicules/peugeot2008/peugeot2008-1.jpg','/photos-vehicules/peugeot2008/peugeot2008-2.jpg','/photos-vehicules/peugeot2008/peugeot2008-3.jpg','/photos-vehicules/peugeot2008/peugeot2008-4.jpg']
      },
     
      {
        id: 'secondCarousel',
        images: ['/photos-vehicules/peugeot208/peugeot208.jpg', '/photos-vehicules/peugeot208/peugeo208-2.jpg', '/photos-vehicules/peugeot208/peugeot208-3.jpg', '/photos-vehicules/peugeot208/peugeot208-4.jpg']
      }
    ];
    console.log(sections);
    for (let i = 0; i < sections.length; i++) {
      let section = sections[i];
      let carousel = document.getElementById(section.id + '-carousel')
      let images = carousel.getElementsByTagName('img');
      let prevButton = document.getElementById(section.id + '-prev');
      let nextButton = document.getElementById(section.id + '-next');
      let currentIndex = 0;

      function showImage(index) {
        for (let i = 0; i < images.length; i++) {
          images[i].style.display = 'none';
        }
        images[index].style.display = 'block';
      }
  
      function prevImage() {
        currentIndex--;
        if (currentIndex < 0) {
          currentIndex = images.length - 1;
        }
        showImage(currentIndex);
      }
  
      function nextImage() {
        currentIndex++;
        if (currentIndex >= images.length) {
          currentIndex = 0;
        }
        showImage(currentIndex);
      }
  
      prevButton.addEventListener('click', prevImage);
      nextButton.addEventListener('click', nextImage);
      
      showImage(currentIndex);
    }
  };


  
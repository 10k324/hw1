let i=0;

function cambiapanino() {
var panino=[];
panino[0]='immagini/222_desktop_it.png';
panino[1]='immagini/asiago.png';
panino[2]='immagini/baconking.png';
document.querySelector('#boxburger img').src=panino[i];
console.log('ciao');
i++;
if(i>=3)
i=0;
}

let button = document.querySelector('.pulsante');
button.addEventListener('click', cambiapanino);

document.querySelectorAll('.panino').forEach(panino => {
    panino.addEventListener('mouseover', function(){
        this.classList.add('panino2');
    });

    panino.addEventListener('mouseout', function(){
        this.classList.remove('panino2');
    });
});


document.addEventListener("DOMContentLoaded", function() {
   
    var pulsantiItalianKings = document.querySelector('.barra2 .Italian-Kings');
    var pulsantiManzo = document.querySelector('.barra2 .Manzo');
    var pulsantiBestSeller = document.querySelector('.barra2 .Best-Seller');
    pulsantiItalianKings.addEventListener('click', function() {
        mostraPaniniCorrispondenti(this);
        cambiaColoreSfondo(this);
    });
    pulsantiManzo.addEventListener('click', function() {
        mostraPaniniCorrispondenti(this);
        cambiaColoreSfondo(this);
    });
    pulsantiBestSeller.addEventListener('click', function() {
        mostraPaniniCorrispondenti(this);
        cambiaColoreSfondo(this);
    });

    function mostraPaniniCorrispondenti(pulsante) {
    
        var tuttiPanini = document.querySelectorAll('.barra3 .panino');
        tuttiPanini.forEach(function(panino) {
            panino.style.display = 'none';
        });

        var tuttiPulsanti = document.querySelectorAll('.barra2 span');
        tuttiPulsanti.forEach(function(pulsante) {
            pulsante.style.backgroundColor = '';
        });

   
        if (pulsante.classList.contains('Italian-Kings')) {
      
            var paninoSpeckAsiago = document.querySelector('.barra3 .panino[data-index="1"]');
            var paninoParmiggianoReggiano = document.querySelector('.barra3 .panino[data-index="3"]');
            paninoSpeckAsiago.style.display = 'block';
            paninoParmiggianoReggiano.style.display = 'block';
        }
 
        else if (pulsante.classList.contains('Manzo')) {
  
            var paniniConBacon = document.querySelectorAll('.barra3 .panino[data-index="2"], .barra3 .panino[data-index="4"], .barra3 .panino[data-index="5"]');
            paniniConBacon.forEach(function(panino) {
                panino.style.display = 'block';
            });
        }
    
        else if (pulsante.classList.contains('Best-Seller')) {
         
            tuttiPanini.forEach(function(panino) {
                panino.style.display = 'block';
            });
        }
    }

    function cambiaColoreSfondo(pulsante) {
       
        pulsante.style.backgroundColor = 'orange';
    }
});



const apiUrl = 'https://www.thecocktaildb.com/api/json/v1/1/search.php?s=gin';


fetch(apiUrl)
  .then(response => {
   
    if (!response.ok) {
      throw new Error('Errore nella richiesta');
    }
  
    return response.json();
  })
  .then(data => {
  
    console.log(data);
      
        const cocktails = data.drinks.slice(0, 5); 
        const cocktailLista = document.getElementById('cocktail-lista');
        cocktails.forEach(cocktail => {
            const title = cocktail.strDrink;
            const imageUrl = cocktail.strDrinkThumb;

         
            const cocktailElement = document.createElement('div');
            cocktailElement.classList.add('bevanda');

            const titleElement = document.createElement('h3');
            titleElement.textContent = title;

            const imageElement = document.createElement('img');
            imageElement.src = imageUrl;
            imageElement.alt = title;

          
            cocktailElement.appendChild(titleElement);
            cocktailElement.appendChild(imageElement);
            cocktailLista.appendChild(cocktailElement);
        });
      }) 
  .catch(error => {

    console.error('Si è verificato un errore:', error);
  });


function fetchCocktails() {
  const url = 'https://www.thecocktaildb.com/api/json/v1/1/search.php?s=gin';
  fetch(url)
  .then(response => {
      if (!response.ok) {
          throw new Error('Errore nella richiesta');
      }
      return response.json();
  })
  .then(data => {
      console.log('Dati ottenuti:', data);
      const cocktails = data.drinks.slice(0, 5); 
      cocktails.forEach(cocktail => {
        
          console.log(cocktail.strDrink);
      });
  })
  .catch(error => {
      console.error('Si è verificato un errore:', error);
  });
}


fetchCocktails();



var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


var player1, player2;
function onYouTubeIframeAPIReady() {
  player1 = new YT.Player('player1', {
    height: '360',
    width: '640',
    videoId: 'R1zzIoWKyD8', 
    events: {
      'onReady': onPlayerReady1,
      'onStateChange': onPlayerStateChange
    }
  });

  player2 = new YT.Player('player2', {
    height: '360',
    width: '640',
    videoId: '3fN1ofZwHZ4', 
    events: {
      'onReady': onPlayerReady2,
      'onStateChange': onPlayerStateChange
    }
  });
}


function onPlayerReady1(event) {
  event.target.playVideo();
}


function onPlayerReady2(event) {
  event.target.playVideo();
}

var done = false;
function onPlayerStateChange(event) {
  if (event.data == YT.PlayerState.PLAYING && !done) {
    setTimeout(stopVideos, 6000);
    done = true;
  }
}


function stopVideos() {
  player1.stopVideo();
  player2.stopVideo();
}

var video2Url = 'https://www.youtube.com/watch?v=3fN1ofZwHZ4';


var fetchOptionsForSecondVideo = {
  mode: 'no-cors'
};


fetch(video2Url, fetchOptionsForSecondVideo)
  .then(function(response) {
   
  })
  .catch(function(error) {
    console.error('Errore nella richiesta fetch:', error);
  });


  function toggleMenu() {
    var menuContent = document.getElementById("menuContent");
    if (menuContent.style.display === "block") {
      menuContent.style.display = "none";
    } else {
      menuContent.style.display = "block";
    }
  }

 

  function scrollToPanini() {
    var paniniSection = document.getElementById("i-nostri-prodotti");
    if (paniniSection) {
      paniniSection.scrollIntoView({ behavior: "smooth" });
    }

    closeMenu();
  }
  
  function scrollToCocktail() {
    var cocktailSection = document.getElementById("cocktail");
    if (cocktailSection) {
      cocktailSection.scrollIntoView({ behavior: "smooth" });
    }
   
    closeMenu();
  }
  
  function closeMenu() {
    var menuContent = document.getElementById("menuContent");
    if (menuContent) {
      menuContent.style.display = "none";
    }
  }
 

var map, infobox;

var infoboxTemplate = '<div class="customInfobox"><div class="title">{title}</div>{description}</div>';

function mostraMappa() {
   
    document.getElementById("mapContainer").style.display = "block";

    var script = document.createElement("script");
    script.setAttribute("type", "text/javascript");
    script.setAttribute("src", "https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=RQCy1YzLhGttm1eagE4S~Q2vmmZM32LFyUArO2z5-tQ~AvhaqwmG_ntF9BWYinKVmc8uQF46oZLJNUMU3wCL7Gl7aaOdhKDM7KaPCCmNLqWq");
    document.body.appendChild(script);
}

function GetMap() {
    map = new Microsoft.Maps.Map('#mapContainer', {
        center: new Microsoft.Maps.Location(37.504745, 15.087554), 
        zoom: 15 
    });

    var center = map.getCenter();

   
    var title = 'Burger King - Piazza Santa Maria di Gesù';
    var description = 'Indirizzo: Piazza Santa Maria di Gesù, Catania, Italia<br>Orario di apertura: Lun-Dom 10:00-23:00';

   
    var closeButton = '<a href="javascript:closeInfobox()" class="customInfoboxCloseButton">X</a>';

    infobox = new Microsoft.Maps.Infobox(center, {
        htmlContent: infoboxTemplate.replace('{title}', title).replace('{description}', description) + closeButton
    });

   
    infobox.setMap(map);
}

function closeInfobox() {
    infobox.setOptions({ visible: false });
}



var teamStats=null;
var articles=null;
var currentArticle=null;

function showTeamStats(team)
{
    document.getElementById("teamName").innerHTML=teamStats[team][0];
    document.getElementById("teamCoach").innerHTML=teamStats[team][1];
    document.getElementById("teamPlayer").innerHTML=teamStats[team][2];
    document.getElementById("teamPos").innerHTML=teamStats[team][3];
    document.getElementsByClassName("myModal")[0].style.display = "initial";
  
}

function hideModal()
{
    document.getElementsByClassName("myModal")[0].style.display = "none";
}


function loadContent(htmlReq) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("content").innerHTML = this.responseText;
			if(htmlReq=="main.html"){
                htmlReq+="?pseudoParam= "+new Date().getTime();
				fetchJSONFile('components/teamStats.json', function(data){
			        teamStats=data;
                });
                fetchJSONFile('components/articles.json', function(data){
                    articles=data;
                    loadAllArticles();
                });
                
			}
		}
	};
	xhttp.open("GET", htmlReq, true);
	xhttp.send();
}


function fetchJSONFile(path, callback) {
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function() {
        if (httpRequest.readyState === 4) {
            if (httpRequest.status === 200) {
                var data = JSON.parse(httpRequest.responseText);
                if (callback) callback(data);
            }
        }
    };
    httpRequest.open('GET', path);
    httpRequest.send(); 
}



function loadArticle(articleNr){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("content").innerHTML = this.responseText;
				fetchJSONFile('components/articles.json', function(data){
                    articles=data;
                    currentArticle=articleNr;
                    showArticle();
                });               
                
			}
        };
    
	xhttp.open("GET", "article.html", true);
    xhttp.send();
}

function showArticle(){
   //console.log(articles["myarticles"][currentArticle]);
   document.getElementById("article-title").innerHTML=articles["myarticles"][currentArticle].title;
   document.getElementById("article-description").innerHTML=articles["myarticles"][currentArticle].description;
   document.getElementById("article-text").innerHTML=articles["myarticles"][currentArticle].text;
   var style = "linear-gradient(rgba(0, 0, 0, 0.35),rgba(0, 0, 0, 0.35)),url(\"../media/articles/"+ articles["myarticles"][currentArticle].photo +"\");";
   document.getElementById("art_hero_container").setAttribute("style", "background-image:"+style);
}



function loadAllArticles(){
    document.getElementById("art0-title").innerHTML=articles["myarticles"][0].title;
    document.getElementById("art0-description").innerHTML=articles["myarticles"][0].description;
    document.getElementById("art0-image").setAttribute("style", "background-image: linear-gradient(rgba(0, 0, 0, 0.35),rgba(0, 0, 0, 0.35)),url(\"../media/home/"+ articles["myarticles"][0].photo +"\");");

    document.getElementById("art1-title").innerHTML=articles["myarticles"][1].title;
    document.getElementById("art1-description").innerHTML=articles["myarticles"][1].description;
    document.getElementById("art1-category").innerHTML=articles["myarticles"][1].category;
    document.getElementById("art1-image").setAttribute("src","../media/home/"+ articles["myarticles"][1].photo);

    document.getElementById("art2-title").innerHTML=articles["myarticles"][2].title;
    document.getElementById("art2-description").innerHTML=articles["myarticles"][2].description;
    document.getElementById("art2-category").innerHTML=articles["myarticles"][2].category;
    document.getElementById("art2-image").setAttribute("src","../media/home/"+ articles["myarticles"][2].photo);

    document.getElementById("art3-title").innerHTML=articles["myarticles"][3].title;
    document.getElementById("art3-description").innerHTML=articles["myarticles"][3].description;
    document.getElementById("art3-category").innerHTML=articles["myarticles"][3].category;
    document.getElementById("art3-image").setAttribute("src","../media/home/"+ articles["myarticles"][3].photo);

    document.getElementById("art4-title").innerHTML=articles["myarticles"][4].title;
    document.getElementById("art4-description").innerHTML=articles["myarticles"][4].description;
    document.getElementById("art4-category").innerHTML=articles["myarticles"][4].category;
    document.getElementById("art4-image").setAttribute("src","../media/home/"+ articles["myarticles"][4].photo);

    document.getElementById("art5-title").innerHTML=articles["myarticles"][5].title;
    document.getElementById("art5-description").innerHTML=articles["myarticles"][5].description;
    document.getElementById("art5-category").innerHTML=articles["myarticles"][5].category;
    document.getElementById("art5-image").setAttribute("src","../media/home/"+ articles["myarticles"][5].photo);

}


function showText(){
  console.log(document.getElementById("art-text").innerHTML.replace(/[\r\n]+/g, ""));
}

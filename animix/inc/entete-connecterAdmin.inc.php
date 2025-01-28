<style>
    body{ 
    color: white;
    background-color: black;
   

}
 nav p{
    font-weight: bold;
}
nav p:first-of-type{
    font-size: xx-large;
    font-weight: bold;
}
nav{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    border-bottom: solid white 1px;
}

a{
    color: white;
    text-decoration: none;
}

.conteneur_principal {
  min-height: 800px;
  display: grid;
  grid-template-columns: 200px auto 50px;
}

.zone_gauche {
 
  background-color: ;
  display: flex;
  flex-wrap: wrap;
  align-items: space-between;
  
}
.zone_gauche > h2 {
  padding: 20px 0px;
}
.zone_gauche > ul {
  list-style-type: none;
  padding: 0px;
  border-right:5px orange solid;
}
.zone_gauche > ul > li {
  height: 30px;
  padding: 10px;
  color: white;
  font-weight: bold;
  border: 2px orange solid;
}
.zone_gauche > ul > li:hover {
  
  background-color: orange;
}
.zone_gauche > ul > li:visited {
  background-color: orange;
  
}



/* ------------ Zone centrale --------------------------------------- */
.zone_centre {
  
  
  background-position:  center;
  background-size: 1000px 5000px;
  display: flex;
  flex-wrap: wrap;
  padding: 10px;
  justify-content: space-around;
 align-items: center;

}
.zone_centre > div {
  display: grid;

  margin: 20px;
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
 justify-content: space-around;
 align-items: center;
}
table {
  border-collapse: collapse;
  width: 100%;
}

table th, table td {
  padding: 10px;
  text-align: left;
}

table th {
  background-color: orange;
  font-weight: bold;
}



table tr:hover {
  background-color: #eaeaea;
  color:black;
}

table td:first-child {
  border-left: 1px solid #ccc;
}

table td:last-child {
  border-right: 1px solid #ccc;
}

table td, table th {
  border-bottom: 1px solid #ccc;
}

.rating img {
    display: inline-block; 
    width: 40px; 
    height: 40px; 
}


</style>
<body>
    <nav>
        <p><a href="Accueil.php"><img class="raing img" src="img/logo-animix.png" alt="logo"></a></p>  
        <p> <a href="Accueil.php">Accueil</a> </p> 
        <p><a href="anime.php">Anime</a> </p> 
        <p><a href="films.php">Film</a> </p> 
        <p><a href="watchlist.php">Watchlist</a> </p>
        <p><a href="options.php">Options</a> </p>
         <p> <a href="deconnexion.php">Deconnexion</a> </p>
    
</nav>  
</body>
</html>

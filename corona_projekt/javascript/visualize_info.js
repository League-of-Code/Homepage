//WICHTIG: Um das ganze hier funktionieren zu lassen muss bei diagramme_2.html für jedes onclick = ... ein:
//onclick = extract_values(bundesland); visualize_numbers(numbers_today); 
//... eingesetzt werden. Ohne diesen Tausch funktioniert die Datenbankabfrage nicht.

var karte = document.getElementById("deutschland");
var diagramm = document.getElementById("chartContainer");
var numbers_today;
var visualize = true;

function klick(){
    bewegeElemente();
}

function bewegeElemente(){
    karte.style.transform = "translate(-34vw, 0)";
	diagramm.style.transform = "translate(-55vw,0)";
}

function extract_values(bundesland) {
	klick();
	if (bundesland == "") {
		document.getElementById("txtHint").innerHTML = ""; 
		return; 
	}
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			numbers_today = this.responseText.split('|');
			if(visualize){
				console.log("Hello world!");
				visualize_numbers(numbers_today);
			}
		}
	};

	xhttp.open("GET", "../php/ordered_output.php?q="+bundesland, true);
	xhttp.send();
}

function visualize_numbers(numbers) {
		var chart = new CanvasJS.Chart("chartContainer", {
		animationEnabled: true,
		theme: "light1", // "light1", "light2", "dark1", "dark2"
		title:{
			text: "Coronadaten: " + numbers[0]
		},
		axisY: {
			title: "involved people"
		},
		data: [{        
			type: "column",  
			showInLegend: true,
			backgroundColor: "grey",
			legendMarkerColor: "grey",
			legendText: "Fallzahlen aus " + numbers[0] + " am " + numbers[1],
			dataPoints: [      
				{ y: parseInt(numbers[3],10),  label: "Heute: Neuinfektionen" },
				{ y: parseInt(numbers[4],10),  label: "Letzte 7 Tage: Neuinfektionen" },
				{ y: parseInt(numbers[6],10),  label: "Gesamt: Verstorben" },
			]
		}]
	});
	chart.render();
}

//Eingabe: 2 Bundesländer (Achtung!!! Datenbank-Formation der Bundesländer bedenken!!!)
//Extrahiert die Werte für die Bundesländer und zeigt diese dann an :)
//Die Funktion ist vollständig einsatzbereit, sobald die extract_values Funktion und die damit verbundene 
//Datenbankabfrage wieder funktioniert.
function compare_bundeslaender(land1, land2) {
	extract_values(land1);
	var land1_neuinfektionen = parseInt(numbers_today[3], 10);
	var land1_7_tage = parseInt(numbers_today[4], 10);
	var land1_verstorben = parseInt(numbers_today[6], 10);

	extract_values(land2);
	var land2_neuinfektionen = parseInt(numbers_today[3], 10);
	var land2_7_tage = parseInt(numbers_today[4], 10);
	var land2_verstorben = parseInt(numbers_today[6], 10);

	//Da nun die Werte erfolgreich extrahiert wurden, forme ich sie zu "normalen" Strings um (ohne diese 
	//Datenbank-Punkte), um einen schönen Output zu ermöglichen :)
	switch (land1) {
		case "Nord­rhein-West­falen":
			land1 = "Nordrhein-Westfalen";
			break;
		case "Baden-Württem­berg":
			land1 = "Baden-Württemberg";
			break;
		case "Hessen":
			land1 = "Hessen";
			break;
		case "Bremen":
			land1 = "Bremen";
			break;
		case "Nieder­sachsen":
			land1 = "Niedersachsen";
			break;
		case "Thüringen":
			land1 = "Thüringen";
			break;
		case "Hamburg":
			land1 = "Hamburg";
			break;
		case "Schles­wig-Holstein":
			land1 = "Schleswig-Holstein";
			break;
		case "Rhein­land-Pfalz":
			land1 = "Rheinland-Pfalz";
			break;
		case "Saarland":
			land1 = "Saarland";
			break;
		case "Bayern":
			land1 = "Bayern";
			break;
		case "Berlin":
			land1 = "Berlin";
			break;
		case "Sachsen-Anhalt":
			land1 = "Sachsen-Anhalt";
			break;
		case "Sachsen":
			land1 = "Sachsen";
			break;
		case "Branden­burg":
			land1 = "Brandenburg";
			break;
		case "Meck­lenburg-":
			land1 = "Mecklenburg-Vorpommern";
			break;
	}

	switch (land2) {
		case "Nord­rhein-West­falen":
			land2 = "Nordrhein-Westfalen";
			break;
		case "Baden-Württem­berg":
			land2 = "Baden-Württemberg";
			break;
		case "Hessen":
			land2 = "Hessen";
			break;
		case "Bremen":
			land2 = "Bremen";
			break;
		case "Nieder­sachsen":
			land2 = "Niedersachsen";
			break;
		case "Thüringen":
			land2 = "Thüringen";
			break;
		case "Hamburg":
			land2 = "Hamburg";
			break;
		case "Schles­wig-Holstein":
			land2 = "Schleswig-Holstein";
			break;
		case "Rhein­land-Pfalz":
			land2 = "Rheinland-Pfalz";
			break;
		case "Saarland":
			land2 = "Saarland";
			break;
		case "Bayern":
			land2 = "Bayern";
			break;
		case "Berlin":
			land2 = "Berlin";
			break;
		case "Sachsen-Anhalt":
			land2 = "Sachsen-Anhalt";
			break;
		case "Sachsen":
			land2 = "Sachsen";
			break;
		case "Branden­burg":
			land2 = "Brandenburg";
			break;
		case "Meck­lenburg-":
			land2 = "Mecklenburg-Vorpommern";
			break;
	}

	//An das HTML-Team: gebt statt my_chart bitte das Element ein, wo ihr das Diagramm hin haben wollt
	let my_chart = document.getElementById('my_chart').getContext('2d');

	let corona_bar_chart = new Chart(my_chart, {
		type: 'bar',
		data:{
			labels:[land1 + " Neuinfektionen 24 Stunden", land2 + " Neuinfektionen 24 Stunden", land1 + " Neuinfektionen 7 Tage", land2 + " Neuinfektinoen 7 Tage", land1 + " Verstorben", land2 + " Verstorben"],
			datasets:[{
				label: "Corona-Zahlen",
				data:[
					land1_neuinfektionen,
					land2_neuinfektionen,
					land1_7_tage,
					land2_7_tage,
					land1_verstorben,
					land2_verstorben
				],
				backgroundColor:[
					"#FF7D7D",
					"#FF7D7D",
					"#4B4B4B",
					"#4B4B4B",
					"#7277FF",
					"#7277FF"
				],
				borderWidth:1,
				borderColor:"#777",
				hoverBorderWidth:3,
				hoverBorderColor:"#000"
			}]
		},
		options:{
			title:{
				display:true,
				text:"Corona Zahlen"
			},
			legend:{
				display: false
			}
		}
	});


}


function count_words() {

	let input = document.getElementById("input").value;
	if (input.length == 0) {
		alert("Text must not be empty.");
		return;
	}
	
	// Αφαίρεσα τα match για newline και end of line ώστε να κάνει match 
	// και σειρές λέξεων αντί για μόνο λίστες με μία λέξη ανα γραμμή. 
	const words = input.match(/[0-9a-zA-Z]+/g);
	if (words == null) {
		alert("No words were given.")
		return;
	}

	let freq_arr = [];
	let max = ""; let most_appearances = 0;
	let short_word_found = false;
	for (let word of words) {

		if (word.length < 4) {
			short_word_found = true;
			continue;
		}

		if (freq_arr[word] == undefined) {
			freq_arr[word] = 0;
		}

		freq_arr[word] += 1;

		// Αν υπαρχουν λέξεις με την ίδια συχνότητα επιλέγει αυτή που βρήκε πρώτα.
		// Αντικατάσταση του max με μία λίστα επιτρέπει να εμφανίσει λέξεις με ίση μέγιστη συχνότητα.
		if (freq_arr[word] > most_appearances) {
			most_appearances = freq_arr[word]; 
			max = word;
		}
	}

	console.log(freq_arr, freq_arr.length)
	let alert_msg = "";
	if (max !== "")
		alert_msg += "Most common word is \"" + max + "\", appearing " + most_appearances + " times.\n";
	if (short_word_found == true)
		alert_msg += "Words under 4 letters are not allowed and will be skipped.";
	alert(alert_msg);

}
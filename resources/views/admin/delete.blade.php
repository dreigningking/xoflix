$(document).on('click',".add-reg", function () {
    $("#trial_wrapper").append(regcontent);
    for (var i = 0; i < pasteButton.length; i++) {
        pasteButton[i].addEventListener('click', async (e) => {
            let input = e.target.parentElement.querySelector("input")
            try {
                const text = await navigator.clipboard.readText()
                input.value = text;
            }catch (error) {
                console.log('Failed to read clipboard');
            }
        })
    }
    return false;
});  
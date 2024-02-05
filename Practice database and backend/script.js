var i = 0;
var txt =[`
        #include <stdio.h>
        int main() {
            x = 3;
            printf("Value of x: %d\\n", x);
            x = x * 2;
            printf("Value of x after doubling: %d\\n", x);
            return 0;
        }`,
`
        #include <stdio.h>
        int main() {
            x = 3;
            printf("Value of x: %d\\n", x);
            x = x * 2;
            printf("Value of x after doubling: %d\\n", x);
            return 0;
        }`,
        `
        #include <stdio.h>
        int main() {
            x = 3;
            printf("Value of x: %d\\n", x);
            x = x * 2;
            printf("Value of x after doubling: %d\\n", x);
            return 0;
        }`,
        `
        #include <stdio.h>
        int main() {
            x = 3;
            printf("Value of x: %d\\n", x);
            x = x * 2;
            printf("Value of x after doubling: %d\\n", x);
            return 0;
        }`,
        `
        #include <stdio.h>
        int main() {
            x = 3;
            printf("Value of x: %d\\n", x);
            
        }`,]
        
        ;
var speed = 25;

function typeWriter() {
    if (i < txt[2].length) {
      const targetDiv = document.getElementById("demo");
      targetDiv.innerHTML += `<span style="color: green;   font-weight: bold;
      ">${txt[2].charAt(i)}</span>`;
      i++;
      setTimeout(typeWriter, speed);
    }
  }
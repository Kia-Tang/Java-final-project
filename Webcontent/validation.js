const validation = new JustValidate("#signup");

.addField("#name", [
    {
        rule: "required"
    },
    {
        validator: (value) => {
            return fetch("validate-name.php?name=" + encodeURIComponent(value))
                .then(function(response) {
                    return response.json();
                })
                .then(function(json) {
                    return json.available;
                });
        },
        errorMessage: "Name already taken"
    }
])

    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        },
        {
            validator: (value) => {
                return fetch("validate-email.php?email=" + encodeURIComponent(value))
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(json) {
                        return json.available;
                    });
            },
            errorMessage:"eamil already taken"
        }
    ])

    
    .addField("#password",[
        {
            rule: "required",
            errorMessage: "Password is required",
        },
        {
            rule: "password",
            errorMessage: "Password must contain at least 8 characters, one letter, and one number",
            validator: (value) => {
                return value.length >= 8 && /[a-z]/i.test(value) && /[0-9]/.test(value);
            },
        }
    ])
    .addField("#password_confirmation", [
        {
            validator: (value, fields) => {
                const match = value === fields['#password'].elem.value;
                console.log("Password match check:", match);  // 输出到控制台，看是否被调用及结果如何
                return match;
            },
            errorMessage: "Passwords should match"
        }
    ])
    
    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Mail</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div style="display: flex; flex-direction: column; align-items: center; gap: 1.25rem; textblue">
        <p style="font-weight: 400; font-size: 1.75rem; margin-top: 2.75rem;"><span
                style="font-weight: 600;">{{ $user->name }}</span>, welcome to GeeksBank!</p>
        <div style="background-color: rgb(59, 130, 246); padding: 1.75rem; border-radius: 1rem; color: white;">
            <p style="font-size: 1.75rem; margin-bottom: 1.5rem;">{{ implode(' ', str_split($card->number, 4)) }}</p>

            <div style="display: flex; gap: 2.5rem;">
                <div>
                    <p style="opacity: 0.875;">Balance</p>
                    <p style="font-size: 1.25rem;">{{ $card->balance }} Dh</p>
                </div>
                <div>
                    <p style="opacity: 0.875;">Exepire in</p>
                    <p style="font-size: 1.25rem;">{{ $card->date->format('m/d') }}</p>
                </div>
                <div>
                    <p style="opacity: 0.875;">Cvv</p>
                    <p style="font-size: 1.25rem;">{{ $card->code }}</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

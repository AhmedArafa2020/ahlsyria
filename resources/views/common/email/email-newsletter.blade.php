<!DOCTYPE html>
<html lang="ar" style="-ms-text-size-adjust: 100%;
                    -webkit-text-size-adjust: 100%;
                    -webkit-print-color-adjust: exact;"
>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lexend:wght@400,700" rel="stylesheet">
    </head>

    <body dir="rtl" style="font-family: 'Lexend', sans-serif;
                        font-size: 15px;
                        min-width: 400px;
                        margin: 0;"
    >
    @php
        $heading = @$data['newsletter']->title;
        $sub_heading = @$data['newsletter']->sub_title;
    @endphp
        <table style="border-collapse: collapse; width: 100%;">
            <tbody>
                <tr>
                    <td style="padding: 0;">
                        <table style="border-collapse: collapse; width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="background: #21c6fb; text-align: center;">
                                            <div style="display: flex;
                                                        height: 64px;
                                                        width: 200px;
                                                        align-items: center;
                                                        justify-content: center;
                                                        margin: auto;
                                                        padding: 16px 15px;"
                                            >
                                                <img src="{{ @showImage(setting('favicon'), 'favicon.png') }}" style="max-height: 100%; max-width: 100%;" alt="Logo">
                                            </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 40px 15px;">
                        <table style="border-collapse: collapse;
                                    min-width: 320px;
                                    max-width: 600px;
                                    width: 100%;
                                    margin: auto;"
                        >
                            @if($heading)
                                <tr>
                                    <td style="padding: 0;">
                                        <h2 style="font-family: 'Lexend', sans-serif;
                                                font-weight: 400;
                                                font-size: 21px;
                                                line-height: 26px;
                                                margin: 0 0 15px;
                                                color: #0f6aff;"
                                        >
                                            {{ $heading }}
                                        </h2>
                                    </td>
                                </tr>
                            @endif

                            @if($sub_heading)
                                <tr>
                                    <td style="padding: 0;">
                                        <h3 style="font-family: 'Lexend', sans-serif;
                                                font-weight: 400;
                                                font-size: 18px;
                                                line-height: 21px;
                                                margin: 0 0 15px;
                                                color: #555555;"
                                        >
                                            {{ $sub_heading }}
                                        </h3>
                                    </td>
                                </tr>
                            @endif

                            <tr>
                                <td style="padding: 0;">
                                    <p style="font-family: 'Lexend', sans-serif;
                                                font-weight: 400;
                                                font-size: 16px;
                                                line-height: 26px;
                                                display: block;"
                                    >
                                        {!! @$data['newsletter']->content !!}
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 15px 0; background: #f1f3f7; text-align: center;">
                        <span style="font-family: 'Lexend', sans-serif;
                                    font-weight: 400;
                                    font-size: 16px;
                                    line-height: 26px;
                                    display: inline-block;
                                    color: #555555;
                                    padding: 0 15px;"
                        >
                            {{ Setting('footer_text') }}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>

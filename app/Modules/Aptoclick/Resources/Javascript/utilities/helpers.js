
export function formatMoney(price)
{
    var formatter = new Intl.NumberFormat(
        "en-US", {
            currency: "USD",
            minimumFractionDigits: 2,
            style: "currency",
        }
    )

    return formatter.format(price)
}

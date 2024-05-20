import { Controller } from "@hotwired/stimulus";
import Chart from "apexcharts";
import _ from "lodash";

// Connects to data-controller="apexcharts"
export default class extends Controller {
    static values = { options: Object };

    connect() {
        const options = _.merge(
            {
                chart: {
                    height: 350,
                    type: "area",
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    curve: "smooth",
                },
                xaxis: {
                    type: "datetime",
                },
            },
            this.optionsValue,
        );

        const chart = new Chart(this.element, options);
        chart.render();
    }
}
